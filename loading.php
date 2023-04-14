<div class="loading">
  <div id="loading-bar-spinner" class="spinner">
    <div class="spinner-icon"></div>
  </div>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .loading {
      position: fixed;
      z-index: 999999;
      height: 100%;
      width: 100%;
      overflow: show;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background: #fff;
      /* background: rgba(255, 255, 255, 0.9); */
    }

    #loading-bar-spinner.spinner {
      left: 50%;
      margin-left: -20px;
      top: 50%;
      margin-top: -20px;
      position: absolute;
      z-index: 99999 !important;
      animation: loading-bar-spinner 500ms linear infinite;
    }

    #loading-bar-spinner.spinner .spinner-icon {
      width: 40px;
      height: 40px;
      border: solid 4px transparent;
      border-top-color: #00C8B1 !important;
      border-left-color: #00C8B1 !important;
      border-radius: 50%;
    }

    @keyframes loading-bar-spinner {
      0% {
        transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>
  <script>
    function hideLoading() {
      // $(".loading").hide();
      $(".loading").fadeOut();
    }

    function showLoading() {
      // $(".loading").show();
      $(".loading").fadeIn();
    }

    function priceToVND(n) {
      let res = parseFloat(n).toLocaleString(`de-DE`)
      return `${res} đ`
    }
  </script>
</div>