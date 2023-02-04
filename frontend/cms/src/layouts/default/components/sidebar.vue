<template>
  <div class="sidebar">
    <div class="slimScrollDiv" >
      <div class="sidebar-inner">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="menu-title">Trang chủ</li>
            <li>
              <router-link to="/dashboard">
                <i class="fa fa-dashboard"></i>
                <span>Quản lý</span>
              </router-link>
            </li>
            <li>
              <router-link to="/products">
                <i class="fa fa-cube"></i>
                <span>Sản phẩm</span>
              </router-link>
            </li>
            <li>
              <router-link to="/categories">
                <i class="fa fa-list"></i>
                <span>Danh mục</span>
              </router-link>
            </li>
            <li>
              <router-link to="/suppliers">
                <i class="fa fa-industry"></i>
                <span>Nhà cung cấp</span>
              </router-link>
            </li>
            <li>
              <router-link to="/brands">
                <i class="fa fa-list"></i>
                <span>Thương hiệu</span>
              </router-link>
            </li>
          </ul>
          <ul>
            <li class="menu-title">Test</li>
            <li> 
              <router-link to="/discounts">
                <i class="fa fa-list"></i>
                <span>Giảm giá</span>
              </router-link>
            </li>
            <li> 
              <router-link to="/coupons">
                <i class="fa fa-list"></i>
                <span>Mã giảm giá</span>
              </router-link>
            </li> 
          </ul>
        </div>
      </div> 
    </div>
  </div>
</template>

<script>

export default {
  name: 'SidebarDefaultView',
}
</script>