
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<?php 
session_start(); 
include 'headers.php'; ?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Healthcare Management System</h1>
    <p class="lead font-weight-normal"> We provide 24-hour emergency and specialized care through our website around the globe.</p>
    <!-- <a class="btn btn-outline-secondary" href="#">Coming soon</a> -->
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Eye Treatments</h2>
      <p class="lead">Bulging Eyes, Cataracts, CMV Retinitis, Crossed Eyes etc we provide solutions for everything.</p>
    </div>
    <div style="background-image: url('images/Standard_Ophthalmic.jpg'); width: 90%; height: 440px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Surgery</h2>
      <p class="lead">Coronary artery bypass, Appendectomy, Carotid endarterectomy, Cesarean section etc all done by best surgeons.</p>
    </div>
    <div style="background-image: url('images/General-Surgical-Devices.jpg'); width: 100%; height: 470px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Pediatricians</h2>
      <p class="lead">Pediatric diseases include anemia, asthma, chickenpox, diphtheria, leukemia, measles, mumps, pneumonia, polio, tuberculosis, whooping cough, lyme disease, fever, down's syndrome, dental caries, cystic fibrosis, chagas disease, candidiasis, cancer, bronchiolitis, etc..</p>
    </div>
    <div style="background-image: url('images/pediatrician-with-baby.jpg'); width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Orthpedics</h2>
      <p class="lead">Osteoarthritis. Rheumatoid Arthritis. Treatment for Arthritis.</p>
    </div>
    <div style="background-image: url('images/ortho.jpg'); width: 90%; height: 440px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Cardiologist</h2>
      <p class="lead">Abnormal heart rhythms, or arrhythmias, Aorta disease and Marfan syndrome, Congenital heart disease, Coronary artery disease (narrowing of the arteries).</p>
    </div>
    <div style="background-image: url('images/cardiologist.jpg'); width: 100%; height: 360px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Neurologists</h2>
      <p class="lead">Disorders include epilepsy, Alzheimer disease and other dementias, cerebrovascular diseases including stroke, migraine and other headache disorders, multiple sclerosis etc.</p>
    </div>
    <div style="background-image: url('images/neurologist.jpg'); width: 100%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Dermatology</h2>
      <p class="lead">Eczema, psoriasis, acne, rosacea, ichthyosis, vitiligo, hives can all be cured.</p>
    </div>
    <div style="background-image: url('images/dermatologist.jpg'); width: 95%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Psychiatrist</h2>
      <p class="lead">Neurodevelopmental Disorders, Schizophrenia Spectrum and Other Psychotic Disorders, Bipolar and Related Disorders, Depressive Disorders, Anxiety Disorders etc.</p>
    </div>
    <div style="background-image: url('images/paps.jpg'); width: 100%; height: 250px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<?php include 'footers.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
</html>
