<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<label>Enter a number</label>
<input type="input" maxlength="6" value="" id="myField"/>

<script>
  $(function () {
    $(document).on("keyup", ":input", function (event) {
      console.log($(this));
      /**
       * 0 = 48; 9 = 57
       * 0 = 144;
       */

      if (event.keyCode >= 48 || event.keyCode <= 57) {
        return true;
      } else {
        $(this).val($(this).val().replace(String.fromCharCode(event.keyCode)));
      }

      return false;
    });
  })
</script>