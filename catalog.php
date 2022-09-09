<!DOCTYPE html>
<html lang="en">
<?php
include "includes/head.php"
?>

<body>

  <?php
  include "includes/navbar.php"
  ?>
  <!--this section is for catalog-->


  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">StuNotes</h2>
        <h1 class="sm-text-3xl text-5xl font-medium title-font text-gray-900 ">Catalog</h1>
      </div>
      <div class="flex flex-wrap m-4">
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col cursor-pointer hover:font-bold " id="hh">
            <div class="flex items-center mb-3">
              <div style="max-width: 18rem;" class="w-8 border-primary h-8 mr-3 inline-flex items-center justify-center rounded-full text-blue-700 flex-shrink-0">
                <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="w-5 h-5" viewBox="0 0 24 24">
                    <i class="fa fa-desktop fa-2x"></i>
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path> -->
                <i class="fa fa-desktop fa-2x"></i>
                </svg>
              </div>

              <a href="cat.php">
                <!-- <i class="fa-thin fa-desktop"></i> -->
                <h1 class="text-gray-900 text-lg font-bold title-font  ">CS/IT</h1>
              </a>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">Platform to find, share and price the soft copies of notes of
                various variety.</p>
              <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>

          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col cursor-pointer hover:font-bold" id="hl">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full text-indigo-500  flex-shrink-0">
                <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg> -->
                <i class="fa fa-gear fa-2x"></i>

              </div>
              <a href="cat.php">
                <h2 class="text-gray-900 text-lg title-font font-medium">mechanical</h2>
              </a>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">An interactive Forum based platform that allows you to help other
                students by sharing notes on forums, learn and connect with other students!</p>
              <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col cursor-pointer hover:font-bold" id="hh">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full text-indigo-500  flex-shrink-0">
                <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="w-5 h-5" viewBox="0 0 24 24">
                  <circle cx="6" cy="6" r="3"></circle>
                  <circle cx="6" cy="18" r="3"></circle>
                  <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                </svg> -->
                <i class="fa fa-home fa-2x"></i>
              </div>
              <h2 class="text-gray-900 text-lg title-fcatalog
              <p class=" leading-relaxed text-base">Opportunity for students to earn by uploading their notes and
                allowing paid access to students!</p>
                <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include "includes/footer.php"
  ?>


</body>

</html>