<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<style>
  #mapid {
    width: 500px;
    height: 500px;
    position: relative;
  }
</style>




<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto">
    <h1 class="my-6 text-center text-4xl font-bold text-black">Les Bureaux sous <?= $_SESSION['name'] ?></h1>
    <div class="container mx-auto">
      <div class="bg-white overflow-hidden shadow rounded-lg flex">
        <div class="col-span-6">
          <div id="mapid"></div>
          <script>
            function initMap() {
              var imageUrl = 'OfficesSTEG/1erETAGE.png';
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
</main>
<footer class="pt-10" >
  <?php require base_path('views/partials/foot.php'); ?>
</footer>