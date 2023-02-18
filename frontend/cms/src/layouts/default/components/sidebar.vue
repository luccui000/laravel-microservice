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
                <i class="fa fa-envira"></i>
                <span>Thương hiệu</span>
              </router-link>
            </li>
          </ul>
          <ul>
            <li class="menu-title">Đơn hàng</li>
            <li> 
              <router-link to="/orders">
                <i class="fa fa-cart-plus"></i>
                <span>Đơn hàng</span>
              </router-link>
            </li>
            <li> 
              <router-link to="/coupons">
                <i class="fa fa-gift"></i>
                <span>Mã giảm giá</span>
              </router-link>
            </li> 
          </ul>
          <ul>
            <li class="menu-title">Khách hàng</li>
            <li> 
              <router-link to="/customers">
                <i class="fa fa-user-plus"></i>
                <span>Danh sách</span>
              </router-link>
            </li>
            <li> 
              <router-link to="/discounts">
                <i class="fa fa-group"></i>
                <span>Nhóm khách hàng</span>
              </router-link>
            </li> 
          </ul> 
          <ul>
            <li class="menu-title">Mục khác</li>
            <li> 
              <router-link to="/posts">
                <i class="fa fa-feed"></i>
                <span>Quản lý bài viết</span>
              </router-link>
            </li>
            <li> 
              <router-link to="/comments">
                <i class="fa fa-comment"></i>
                <span>Quản lý bình luận</span>
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