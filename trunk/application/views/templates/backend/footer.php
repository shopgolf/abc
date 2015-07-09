<style>
#loading-image,#control-image {
  width: 255px;
  height: 355px;
  position: fixed;
    top: 184px;
  right: 582px;
  z-index: 1;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -khtml-border-radius: 10px;
  display: none;
}    
</style>
<div id="loading-image"><img src="<?php echo STATIC_URL.'backend/images/icon/loading.gif' ?>" alt="Loading..." /><p style="text-align: center;">Vui lòng chờ</p></div>
<div id="control-image"><img src="<?php echo STATIC_URL.'backend/images/icon/loading.gif' ?>" alt="Loading..." /><p style="text-align: center;">Đang xử lí</p></div>

<br/>
<footer>
  <p>&copy; <?php echo $this->config->item('site_title') . ' ' . date('Y'); ?>. Page rendered in <strong>{elapsed_time}</strong> seconds.
   Memory use: {memory_usage}</p>
</footer>
</div>
<?php $this->load->view('templates/backend/ajax'); ?>

</body>
</html>