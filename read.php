<?php
$r = $_GET['r'];

?>
<div id="adobe-dc-view" style="height: 360px; width: 500px;"></div>
<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
  document.addEventListener("adobe_dc_view_sdk.ready", function(){
    var adobeDCView = new AdobeDC.View({clientId: "bd63feac3f9b4d758a38e6f187a33d95", divId: "adobe-dc-view"});
    adobeDCView.previewFile({
      content:{ location: 
        { url: "<?php echo $r; ?>"}},
      metaData:{fileName: "<?php echo $r; ?>"}
    },
    {
      embedMode: "SIZED_CONTAINER"
    });
  });
</script>
