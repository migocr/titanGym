<div class="container">
    <div class="row">
        <div class="col-xs-12 h-100 full-screen-spinner">
            <div class="spinner-container">
                <div class="spinner-border" style="color: white" role="status">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .full-screen-spinner {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, .7);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .spinner-container {
        width: 3rem;
        height: 3rem;
        text-align: center;
    }
</style>
<script>
    window.addEventListener('load', () => {
        document.querySelector('.full-screen-spinner').style.display = 'none';
    });
   
    document.addEventListener('click', function (e) {
  if (e.target.tagName === 'A' && !e.target.dataset.bsToggle) {
    document.querySelector('.full-screen-spinner').style.display = 'flex';
  }
});
        
    
</script>