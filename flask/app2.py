from flask import Flask, request, jsonify
from PIL import Image
import numpy as np
import joblib
import os
import tensorflow as tf
from tensorflow.keras.preprocessing import image
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, Conv2D, MaxPooling2D, Flatten, Dropout


app = Flask(__name__)

# Load model joblib dari folder models dengan error handling
try:
   MODEL_PATH = os.path.join(os.path.dirname(__file__), 'models', 'tomato_pest_detection_model_15_tv13_2.joblib')
   print("Loading model from:", MODEL_PATH)
   print("File exists:", os.path.exists(MODEL_PATH))
   print(f"TensorFlow version: {tf.__version__}")
   
   # Load model data
   loaded_data = joblib.load(MODEL_PATH)
   print("Loaded data keys:", loaded_data.keys())
   
   # Rekonstruksi model dari config
   model = Sequential.from_config(loaded_data['model_config'])
   
   # Compile model
   model.compile(
       optimizer='adam',
       loss='categorical_crossentropy',
       metrics=['accuracy']
   )
   
   # Set weights
   model.set_weights(loaded_data['model_weights'])
   
   # Get class indices
   class_indices = loaded_data['class_indices']
   print("Model loaded successfully!")
   print("Architecture:", loaded_data['architecture'])

except Exception as e:
   print(f"Error loading model: {str(e)}")
   raise


solutions = {
    'Pepper__bell___Bacterial_spot':'Solusi: \n1. Gunakan fungisida berbasis tembaga secara berkala dengan dosis yang direkomendasikan.\n2. Lakukan rotasi tanaman dengan jenis yang tidak rentan terhadap penyakit ini.\n3. Hindari penyiraman dari atas untuk mencegah penyebaran bakteri melalui air.\n4. Buang dan musnahkan tanaman yang terinfeksi parah untuk mencegah penyebaran.\n5. Bersihkan alat-alat pertanian secara teratur untuk mengurangi kontaminasi.',
    'Pepper__bell___healthy': 'Tanaman sehat. Lanjutkan perawatan rutin:\n1. Penyiraman secukupnya, hindari genangan air.\n2. Pemupukan seimbang sesuai fase pertumbuhan tanaman.\n3. Pemangkasan rutin untuk meningkatkan sirkulasi udara.\n4. Monitoring kondisi tanaman untuk deteksi dini penyakit atau hama.',
    'Potato___Early_blight': 'Solusi:\n1. Gunakan fungisida berbasis chlorothalonil atau azoxystrobin sesuai rekomendasi.\n2. Lakukan rotasi tanaman setiap musim untuk mengurangi akumulasi patogen di tanah.\n3. Buang daun yang terinfeksi dan musnahkan jauh dari area tanam.\n4. Jaga jarak antar tanaman untuk meningkatkan sirkulasi udara.\n5. Terapkan mulsa organik untuk mencegah spora naik ke daun.',
    'Potato___Late_blight': 'Solusi:\n1. Aplikasikan fungisida berbasis tembaga atau metalaxyl secara preventif.\n2. Tingkatkan sirkulasi udara dengan mengatur jarak tanam yang cukup.\n3. Hindari kelembaban tinggi dengan tidak menyiram langsung pada daun.\n4. Buang tanaman yang terinfeksi parah untuk mencegah penyebaran penyakit.\n5. Pastikan area tanam bebas dari gulma untuk mengurangi tempat berkembangnya patogen.',
    'Potato___healthy': 'Tanaman sehat. Pertahankan kondisi dengan:\n1. Penyiraman teratur dengan volume yang tepat.\n2. Pemupukan seimbang dengan memperhatikan kebutuhan nitrogen, fosfor, dan kalium.\n3. Pengendalian gulma secara rutin untuk menghindari kompetisi nutrisi.\n4. Monitoring rutin untuk mendeteksi potensi serangan hama atau penyakit.\n5. Pastikan rotasi tanaman dilakukan secara berkala.',
    'Tomato_Bacterial_spot': 'Solusi:\n1. Aplikasikan fungisida berbasis tembaga sesuai dosis anjuran.\n2. Hindari penyiraman dari atas untuk mencegah penyebaran bakteri.\n3. Lakukan rotasi tanaman dengan jenis yang tidak rentan terhadap penyakit ini.\n4. Gunakan benih bersertifikat bebas penyakit.\n5. Bersihkan dan sterilisasi alat-alat pertanian sebelum digunakan.',
    'Tomato_Early_blight': 'Solusi:\n1. Gunakan fungisida berbasis chlorothalonil atau mancozeb sesuai petunjuk.\n2. Buang daun yang terinfeksi secara teratur dan musnahkan.\n3. Jaga jarak tanam untuk meningkatkan sirkulasi udara.\n4. Gunakan mulsa organik untuk mencegah penyebaran spora dari tanah ke daun.\n5. Hindari penyiraman berlebihan yang menyebabkan kelembaban tinggi.',
    'Tomato_Late_blight': 'Solusi:\n1. Aplikasikan fungisida sistemik seperti metalaxyl-m sesuai anjuran.\n2. Tingkatkan sirkulasi udara dengan mengatur jarak tanam dan pemangkasan.\n3. Kurangi kelembaban dengan sistem irigasi tetes.\n4. Lakukan sanitasi kebun secara berkala untuk mencegah akumulasi patogen.\n5. Hindari penggunaan tanaman inang di sekitar area tanam.',
    'Tomato_Leaf_Mold': 'Solusi:\n1. Kurangi kelembaban udara dengan meningkatkan ventilasi di sekitar tanaman.\n2. Gunakan kipas atau alat ventilasi jika tanaman berada di greenhouse.\n3. Aplikasikan fungisida berbasis sulfur atau chlorothalonil sesuai kebutuhan.\n4. Buang dan musnahkan daun yang terinfeksi.\n5. Monitor kondisi tanaman secara rutin untuk mencegah penyebaran lebih lanjut.',
    'Tomato_Septoria_leaf_spot': 'Solusi:\n1. Aplikasikan fungisida berbasis mancozeb atau chlorothalonil.\n2. Buang daun yang terinfeksi segera dan musnahkan.\n3. Gunakan mulsa organik untuk mengurangi cipratan tanah ke daun.\n4. Rotasi tanaman setiap musim untuk mengurangi akumulasi patogen di tanah.\n5. Pilih varietas yang tahan terhadap penyakit ini jika memungkinkan.',
    'Tomato_Spider_mites_Two_spotted_spider_mite': 'Solusi:\n1. Gunakan akarisida yang direkomendasikan dan aman untuk tanaman.\n2. Semprotkan air bertekanan tinggi pada bagian bawah daun untuk mengusir hama.\n3. Introduksi predator alami seperti kumbang predator atau tungau predator.\n4. Jaga kelembaban lingkungan untuk mengurangi populasi tungau.\n5. Bersihkan gulma dan sisa tanaman di sekitar area tanam.',
    'Tomato__Target_Spot': 'Solusi:\n1. Aplikasikan fungisida berbasis mancozeb atau chlorothalonil.\n2. Buang dan musnahkan daun yang terinfeksi secara berkala.\n3. Tingkatkan sirkulasi udara dengan mengatur jarak tanam dan pemangkasan.\n4. Pastikan area tanam memiliki drainase yang baik.\n5. Rotasi tanaman dengan jenis yang tidak rentan terhadap penyakit ini.',
    'Tomato__Tomato_YellowLeaf__Curl_Virus': 'Solusi:\n1. Kendalikan serangga vektor seperti kutu kebul dengan insektisida organik atau kimia.\n2. Gunakan varietas tahan virus untuk menurunkan risiko infeksi.\n3. Buang dan musnahkan tanaman yang terinfeksi untuk mencegah penyebaran.\n4. Lakukan rotasi tanaman untuk memutus siklus hidup vektor.\n5. Pasang perangkap kuning untuk memonitor populasi kutu kebul.',
    'Tomato__Tomato_mosaic_virus': 'Solusi:\n1. Buang dan musnahkan tanaman yang terinfeksi.\n2. Gunakan benih bebas virus dan bersertifikat.\n3. Sterilisasi alat-alat pertanian sebelum digunakan.\n4. Kendalikan serangga vektor dengan insektisida jika diperlukan.\n5. Hindari kontak langsung antara tangan yang terkontaminasi dengan tanaman.',
    'Tomato_healthy': 'Tanaman sehat. Pertahankan dengan:\n1. Pemupukan seimbang dengan dosis yang disarankan.\n2. Penyiraman teratur sesuai kebutuhan tanaman.\n3. Pemangkasan rutin untuk meningkatkan sirkulasi udara.\n4. Monitoring rutin terhadap tanda-tanda hama atau penyakit.\n5. Pastikan sanitasi lingkungan sekitar kebun terjaga.'
}


def predict_disease(img):
    # Preprocessing gambar
    img = img.resize((128, 128))
    img_array = image.img_to_array(img) / 255.0
    img_array = np.expand_dims(img_array, axis=0)
    
    # Prediksi
    predictions = model.predict(img_array)
    
    # Dapatkan indeks kelas dengan probabilitas tertinggi
    predicted_class_index = np.argmax(predictions)
    
    # Dapatkan nama kelas dari class_indices
    # Ubah cara akses class_indices
    class_mapping = {v: k for k, v in class_indices.items()}
    predicted_class = class_mapping[predicted_class_index]
    
    print(f"Predicted index: {predicted_class_index}")
    print(f"Class mapping: {class_mapping}")
    print(f"Predicted class: {predicted_class}")
    
    # Dapatkan solusi
    solution = solutions.get(predicted_class, "Solusi tidak tersedia untuk kategori ini.")
    
    # Hitung confidence
    confidence = float(np.max(predictions)) * 100
    
    # Pisahkan jenis tanaman dan kondisi
    plant_parts = predicted_class.split('_')
    plant_type = plant_parts[0]
    condition = ' '.join(plant_parts[1:])
    
    return {
        'jenis_tanaman': plant_type,
        'kondisi': condition,
        'solusi': solution,
        'confidence': confidence
    }

@app.route('/detect', methods=['POST'])
def detect_plant_disease():
    if 'image' not in request.files:
        print("No image file in request")
        return jsonify({
            'status': 'error',
            'message': 'Tidak ada file gambar yang diunggah.'
        }), 400

    try:
        # Buka gambar
        image_file = request.files['image']
        print(f"Received file: {image_file.filename}")
        
        img = Image.open(image_file)
        print("Image opened successfully")

        # Lakukan prediksi
        result = predict_disease(img)
        print(f"Prediction result: {result}")

        return jsonify({
            'status': 'success',
            'result': {
                'jenis_tanaman': result['jenis_tanaman'],
                'kondisi': result['kondisi'],
                'solusi': result['solusi'],
                'confidence': f"{result['confidence']:.2f}%"
            }
        })

    except Exception as e:
        print(f"Detailed error: {str(e)}")
        print(f"Error type: {type(e)}")
        import traceback
        print("Full traceback:")
        traceback.print_exc()
        return jsonify({
            'status': 'error',
            'message': f'Terjadi kesalahan: {str(e)}'
        }), 500

if __name__ == '__main__':
    app.run(port=9001, debug=True)