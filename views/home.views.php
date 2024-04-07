<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php
function getPlcament($placement)
{
  if ($placement === 'RDC') {
    return 'RDC';
  } else {
    return '1er ETAGE';
  }
}

?>

<style>
  #mapid {
    width: 500px;
    height: 500px;
    position: relative;
  }
</style>

<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <br>
  <div class="border border-t-2 border-t-black"></div>

    <form action="" method="GET">
      <div class="">
        <!-- Filter Section -->
        <div class="overflow-hidden rounded-lg p-4 items-center ">
          <div class="flex-grow ">
            <h2 class="text-sm font-bold">Select Placement:</h2>
            <select id="placement" name="placement" class="border border-gray-300 rounded-md p-2 text-center">
              <option value="All">All</option>
              <option value="1er ETAGE">1er ETAGE</option>
              <option value="RDC">RDC</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
          </div>
        </div>
      </div>
    </form>



    <!-- End Filter Section -->
    <div class="container mx-auto">
      <div class="bg-white overflow-hidden shadow rounded-lg flex w-fit">
        <div class="col-span-6">
          <div id="mapid"></div>
          <script>
            function initMap() {
                var imageUrl = '<?= $imageUrl ?>';
              var imageBounds = [
                [15, 3],
                [70, 70]
              ];

              var map = L.map('mapid').setView([50, 10], 3);

              L.imageOverlay(imageUrl, imageBounds).addTo(map);

              var markerCoordinates = [
                <?php foreach ($officesCoords as $coords) : ?>
                  <?= json_encode($coords) ?>,
                <?php endforeach; ?>
              ];

              var greenIcon = L.icon({
                iconUrl: 'images/open.png',
                iconSize: [30, 30],
                popupAnchor: [-3, -76]

              });

              for (var i = 0; i < markerCoordinates.length; i++) {
                var marker = L.marker(markerCoordinates[i], {
                  icon: greenIcon
                }).addTo(map);
              }

              map.fitBounds(imageBounds);
            }

            window.addEventListener('DOMContentLoaded', initMap);
          </script>
        </div>
        <div class="col-span-6 py-4">
          <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 grid lg:grid-cols-3 sm:grid-cols-2 gap-10">
            <?php foreach ($offices as $office) : ?>
              <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-4">
                  <a href="/myoffice?id=<?= $office['id_local'] ?>&offices=<?= $office["placement"] ?>" class="group relative overflow-hidden block ">
                    <img alt="Bureau" class="inset-0 h-full w-full object-cover transition-opacity group-hover:opacity-50" src="<?= $office['image'] ?>">
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if (!empty($brokenEquipments)) : ?>

    <div id="toast-bottom-right" class="fixed w-full max-w-xs p-4 mb-16 space-y-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white items-center justify-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-bottom-right" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
      <?php $count = 0; ?>
      <?php foreach ($brokenEquipments as $brokenEquipment) : ?>
        <?php if ($count < 3) : ?>
          <div class="flex items-center">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
              </svg>
              <span class="sr-only">Refresh icon</span>
            </div>

            <div class="ms-3 text-sm font-normal">
              <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                <!-- svg -->

              </span>
              <div class="mb-2 text-sm font-normal">Equipment en panne ou casse.</div>
              <div class="text-sm font-medium text-red-800">
                <?= $brokenEquipment['count'] ?> broken equipments in <?= $brokenEquipment['office_name'] ?>
              </div>
            </div>
          </div>
          <?php $count++; ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <!-- Button to view all offices -->
      <div class="flex justify-center">
        <button class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 dark:text-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600">
          <a href="/offices">View All Offices</a>
        </button>
      </div>
    </div>
  <?php endif; ?>
  <footer class="pt-20">
  <?php require base_path('views/partials/foot.php') ?>
</footer>


</main>
