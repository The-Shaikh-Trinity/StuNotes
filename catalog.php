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
        <?php
        for ($i = 0; $i < 9; $i++) {

        ?>

          <!-- card 1 -->
          <div class="p-4 md:w-1/3">
            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col cursor-pointer hover:font-bold " id="hh">
              <div class="flex items-center mb-3">
                <div style="max-width: 18rem;" class="w-8 border-primary h-8 mr-3 inline-flex items-center justify-center rounded-full text-blue-700 flex-shrink-0">
                  <!-- <i class="fa fa-desktop  fa-2x"></i>
                 -->
                 <i class="fa-sharp fa-solid fa-notes"></i>
                  </svg>
                </div>

                <a href="cat.php?cat_id=<?php echo $i ?>">

                  <!-- <i class="fa-thin fa-desktop"></i> -->
                  <h1 class="text-gray-900 text-lg font-bold title-font  ">CS/IT</h1>
                </a>
              </div>
              <div class="flex-grow">
                <p class="leading-relaxed text-base">Platform to find, share and price the soft copies of notes of
                  various variety.</p>
                <a class="mt-3 text-indigo-500 inline-flex items-center" href="cat.php">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>

            </div>
          </div>

        <?php
        }
        ?>

      </div>
    </div>
  </section>

  <?php
  include "includes/footer.php"
  ?>


</body>

</html>