<template>
  <div class="newsletter-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
        <div class="display-table">
          <div class="display-table-cell footer-newsletter">
            <div class="section-header text-center">
              <label class="h2">
                <span>Đăng ký </span>nhận thông báo </label>
            </div>
            <form action="#" >
              <div class="input-group">
                <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Địa chỉ email" >
                <span class="input-group__btn">
                  <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe">
                    <span class="newsletter__submit-text--large">Nhận</span>
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
        <div class="footer-social">
          <ul class="list--inline site-footer__social-icons social-icons">
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook">
                <i class="icon icon-facebook"></i>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter">
                <i class="icon icon-twitter"></i>
                <span class="icon__fallback-text">Twitter</span>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest">
                <i class="icon icon-pinterest"></i>
                <span class="icon__fallback-text">Pinterest</span>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram">
                <i class="icon icon-instagram"></i>
                <span class="icon__fallback-text">Instagram</span>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr">
                <i class="icon icon-tumblr-alt"></i>
                <span class="icon__fallback-text">Tumblr</span>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube">
                <i class="icon icon-youtube"></i>
                <span class="icon__fallback-text">YouTube</span>
              </a>
            </li>
            <li>
              <a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo">
                <i class="icon icon-vimeo-alt"></i>
                <span class="icon__fallback-text">Vimeo</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>

export default {
  name: 'NewLetter'
}

</script>