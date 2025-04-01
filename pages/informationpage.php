<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Common Diseases Information</title>
    <style>
      /* General Styles */
      body {
        font-family: "Times New Roman", Times, serif;
        line-height: 1.6;
        margin-left:5px;
        padding: 0;
        width:100%;
      }
      * {
        font-family: "Times New Roman", Times, serif;
        line-height: 1.6;
        padding: 0;
      } 
      header {
        color:rgb(109, 50, 50);
        text-align: center;
        font-weight: bold;
      }
      main {
        padding: 20px;
      }
      .disease {
        background: #fff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.5s ease-in-out;
      }
      .disease-image {
        width: 90%;
        height: 100%;
        border-radius: 8px;
        text-align: center;
      }
      .details {
        margin-top: 10px;
        margin-bottom: 0px;
      }
      .d {
        display: flex;
        flex-wrap: wrap;
        border: 3px solid brown;
      }
      .column {      
        box-sizing: border-box;
      }
      .col-4 {
        background-color: rgb(176, 177, 177);
      }
      .col-8{
        flex: 1;
        background-color: rgb(176, 177, 177);
      }
      .row{
        background-color: rgb(176, 177, 177);
      }
      /* Animation Styles */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease-out;
}

.fade-in.show {
    opacity: 1;
    transform: translateY(0);
}
      @media (max-width: 768px) {
        .d {
          flex-direction: column;
          width: 110%;
          border-radius:10px;
        }
        .row{
          width: 100% !important;
          margin-left:2px !important;
        }
        .col-4,
        .col-8 {
          width: 100% !important;
        }
        .disease {
          padding: 5px;
          width: 100%;
          border-radius:10px;
        }
      }
      @media (min-width: 769px) and (max-width: 1024px) {
        .col-4 {
          flex: 0 0 30%;
        }
        .col-8 {
          flex: 0 0 70%;
        }
        .disease {
          padding: 20px;
        }
      }
   
    </style>
  </head>
  <body>


      <?php include('../Header2.php') ?>
    
      

    <header>
      <h1>Common Diseases Information</h1>
    </header>

    <main>
      <!-- Disease 1 -->
      <section class="disease">
        <div class="row d">
      <h2>Common Cold</h2>

          <div class="col-4">
            <img src="../assets/Disease/commoncold.jpg" alt="Common Cold" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">

              <h3>Description</h3>
               <p>A viral infection affecting the upper respiratory tract (nose and throat).</p>
              <h3>Symptoms</h3>
               <p>Sneezing, runny nose, sore throat, cough, mild fever.</p>
              <h3>Precautions</h3>
                <p>Wash hands frequently, stay hydrated, avoid close contact with sick people.</p>
              <h3>Medicines</h3>
               <p>acetaminophen (for fever), decongestants, and antihistamines. Rest and hydration are key.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 2 -->
      <section class="disease">
        <div class="row d">
        <h2>Influenza(Flu)</h2>
          <div class="col-4">
            <img src="../assets/Disease/Influenza(Flu).jpg" alt="Influenza" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A contagious respiratory illness caused by influenza viruses.</p>
              <h3>Symptoms</h3>
               <p>High fever, chills, muscle aches, cough, sore throat, and fatigue.</p>
              <h3>Precautions</h3>
                <p>Get an annual flu vaccine, practice good hygiene, and avoid close contact with sick people.</p>
              <h3>Medicines</h3>
               <p>oseltamivir (Tamiflu) or zanamivir (Relenza).</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 3 -->
      <section class="disease">
        <div class="row d">
        <h2>Diabetes</h2>
          <div class="col-4">
            <img src="../assets/Disease/Diabetes.jpg" alt="Diabetes" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A chronic condition where the body cannot regulate blood sugar levels properly.</p>
              <h3>Symptoms</h3>
               <p>Increased thirst, frequent urination, fatigue, blurred vision, and slow-healing wounds.</p>
              <h3>Precautions</h3>
                <p>Maintain a healthy diet, exercise regularly, monitor blood sugar levels, and avoid smoking.</p>
              <h3>Medicines</h3>
               <p> Insulin injections or oral medications like metformin.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 4 -->
      <section class="disease">
        <div class="row d">
            <h2>Hypertension(High Blood Pressure)</h2>
            <div class="col-4">
            <img src="../assets/Disease/Hypertension.jpg" alt="Hypertension" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A condition where the force of blood against artery walls is too high.</p>
              <h3>Symptoms</h3>
               <p> Often asymptomatic, but severe cases may cause headaches, dizziness, or nosebleeds.</p>
              <h3>Precautions</h3>
                <p>Reduce salt intake, exercise regularly, avoid smoking, and limit alcohol consumption. </p>
              <h3>Medicines</h3>
               <p>Antihypertensive drugs like ACE inhibitors, beta-blockers, or diuretics.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 5 -->
      <section class="disease">
        <div class="row d">
            <h2>Asthma</h2>
            <div class="col-4">
            <img src="../assets/Disease/Astama.jpg" alt="Asthma" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A chronic inflammatory disease of the airways causing breathing difficulties.</p>
              <h3>Symptoms</h3>
               <p>Wheezing, shortness of breath, chest tightness, and coughing.</p>
              <h3>Precautions</h3>
                <p>Avoid triggers like smoke, pollen, and dust. Use inhalers as prescribed.</p>
              <h3>Medicines</h3>
               <p>Inhalers (e.g., albuterol for quick relief, corticosteroids for long-term control).</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 6 -->
      <section class="disease">
        <div class="row d">
            <h2>Tuberculosis(TB)</h2>
            <div class="col-4">
            <img src="../assets/Disease/Tuberculosis(TB).jpg" alt="Tuberculosis" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A bacterial infection caused by Mycobacterium tuberculosis, primarily affecting the lungs.</p>
              <h3>Symptoms</h3>
               <p>Persistent cough, weight loss, night sweats, fever, and coughing up blood.</p>
              <h3>Precautions</h3>
                <p>Avoid close contact with infected individuals, ensure proper ventilation, and get vaccinated (BCG vaccine).</p>
              <h3>Medicines</h3>
               <p>Antibiotics like isoniazid, rifampin, and ethambutol for several months. </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 7 -->
      <section class="disease">
        <div class="row d">
            <h2>Malaria</h2>
            <div class="col-4">
            <img src="../assets/Disease/Malaria.jpg" alt="Malaria" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>A mosquito-borne disease caused by Plasmodium parasites.</p>
              <h3>Symptoms</h3>
               <p>High fever, chills, headache, nausea, and muscle pain.</p>
              <h3>Precautions</h3>
                <p>Use mosquito nets, insect repellents, and eliminate standing water to prevent breeding.</p>
              <h3>Medicines</h3>
               <p>Antimalarial drugs like chloroquine or artemisinin-based combination therapies.</p>
            </div>
          </div>
        </div>
      </section>


      <!-- Disease 8 -->
      <section class="disease">
        <div class="row d">
            <h2> Cancer</h2>
            <div class="col-4">
            <img src="../assets/Disease/Cancer.jpg" alt="Cancer" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p> A group of diseases involving abnormal cell grow dth with the potential to invade or spread to other parts of the body.</p>
              <h3>Symptoms</h3>
               <p>Vary by type but may include lumps, unexplained weight loss, fatigue, and persistent pain.</p>
              <h3>Precautions</h3>
                <p>Avoid tobacco, limit alcohol, maintain a healthy diet, and get regular screenings.</p>
              <h3>Medicines</h3>
               <p>Chemotherapy, radiation therapy, immunotherapy, and surgery.</p>
            </div>
          </div>
        </div>
      </section>

       <!-- Disease 9 -->
       <section class="disease">
        <div class="row d">
            <h2> HIV/AIDS</h2>
            <div class="col-4">
            <img src="../assets/Disease/Hiv_Aids.jpg" alt="HIV/AIDS" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p> A viral infection that attacks the immune system, leading to acquired immunodeficiency syndrome (AIDS).</p>
              <h3>Symptoms</h3>
               <p>Flu-like symptoms initially, followed by weight loss, fever, and opportunistic infections.</p>
              <h3>Precautions</h3>
                <p>Practice safe sex, avoid sharing needles, and use pre-exposure prophylaxis (PrEP) if at risk.</p>
              <h3>Medicines</h3>
               <p>Antiretroviral therapy (ART) to manage the virus.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Disease 10 -->
      <section class="disease">
        <div class="row d">
            <h2> Arthritis</h2>
            <div class="col-4">
            <img src="../assets/Disease/Arthritis.jpg" alt="Arthritis" class="disease-image" />
          </div>
          <div class="col-8">
            <div class="details">
              <h3>Description</h3>
               <p>  Inflammation of the joints, causing pain and stiffness.</p>
              <h3>Symptoms</h3>
               <p> Joint pain, swelling, stiffness, and reduced range of motion.</p>
              <h3>Precautions</h3>
                <p> Maintain a healthy weight, exercise regularly, and avoid joint injuries.</p>
              <h3>Medicines</h3>
               <p>Pain relievers (e.g., ibuprofen), corticosteroids, and disease-modifying antirheumatic drugs (DMARDs).</p>
            </div>
          </div>
        </div>
      </section>

    </main>



    <?php include('../Footer2.php') ?>


      <script>
        // for sub menu
function showmenu() {
    const show = document.querySelector(".sidebar");
    show.style.display = 'flex';
}

function closemenu() {
    const show = document.querySelector(".sidebar");
    show.style.display = 'none';
}
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.2 } // Trigger when 20% of the element is visible
    );

    sections.forEach((section) => {
        section.classList.add("fade-in"); // Initial hidden state
        observer.observe(section);
    });
});
      </script>
    
  </body>
</html>