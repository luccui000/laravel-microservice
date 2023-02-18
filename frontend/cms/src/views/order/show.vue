<template>
  <div class="content" v-if="order">
    <div class="row">
      <div class="col-sm-5 col-4">
        <h4 class="page-title">Hóa đơn</h4>
      </div>
      <div class="col-sm-7 col-8 text-right m-b-30">
        <div class="btn-group btn-group-sm">
          <button class="btn btn-white">CSV</button>
          <button class="btn btn-white">PDF</button>
          <button class="btn btn-white">
            <i class="fa fa-print fa-lg"></i> In </button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row custom-invoice">
              <div class="col-6 col-sm-6 m-b-20">
                <img src="assets/img/logo.png" class="inv-logo" alt="">
                <ul class="list-unstyled">
                  <li>Minh Lực Shop</li> 
                  <li>Ngũ Lạc, Duyên Hải, Trà Vinh</li>
                  <li>Số điện thoại: 0399942301</li>
                </ul>
              </div>
              <div class="col-6 col-sm-6 m-b-20">
                <div class="invoice-details">
                  <h3 class="text-uppercase">Mã hóa đơn #{{  order.order_number }}</h3>
                  <ul class="list-unstyled">
                    <li>Ngày đặt: <span>{{ order.order_date | dmy  }}</span>
                    </li> 
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-lg-6 m-b-20">
                <h5>Hóa đơn đến:</h5>
                <ul class="list-unstyled mt-4">
                  <li>
                    <h5>
                      <strong>{{ order.customer.name }}</strong>
                    </h5>
                  </li> 
                  <li>{{ order.address }}</li> 
                  <li>{{ order.phone }}</li> 
                  <li>
                    <a v-if="order.customer.email" href="#">{{ order.customer.email  }}</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-6 col-lg-6 m-b-20">
                <div class="invoices-view">
                  <h5>Chi tiết đơn hàng:</h5>
                  <ul class="list-unstyled invoice-payment-details mt-4">
                    <li>
                      <h5>Tổng tiền: 
                        <span class="text-right">{{ order.total | vietnamdong  }}</span>
                      </h5>
                    </li>  
                  </ul>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th> 
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th class="text-right">Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in order.details"
                    :key="item.id"
                    >
                    <td>{{  index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price | vietnamdong  }}</td> 
                    <td>{{ item.quantity }}</td>
                    <td class="text-right">{{ item.total | vietnamdong }}</td>
                  </tr> 
                </tbody>
              </table>
            </div>
            <div>
              <div class="row invoice-payment">
                <div class="col-sm-7"></div>
                <div class="col-sm-5">
                  <div class="m-b-20">
                    <h6>Tổng tiền phải trả</h6>
                    <div class="table-responsive no-border">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <th>Thành tiền:</th>
                            <td class="text-right">{{ order.sub_total | vietnamdong }}</td>
                          </tr> 
                          <tr>
                            <th>Giảm giá:</th>
                            <td class="text-right">{{ order.discount | vietnamdong }}</td>
                          </tr>
                          <tr>
                            <th>Phí vận chuyển:</th>
                            <td class="text-right">{{ order.fee | vietnamdong }}</td>
                          </tr>
                          <tr>
                            <th>Tổng tiền:</th>
                            <td class="text-right text-primary">
                              <h5>{{ order.total | vietnamdong }}</h5>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="invoice-info">
                <h5>Ghi chú</h5>
                <p class="text-muted">
                  {{ order.note  }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'OrderShowView',
  data() {
    return {}
  },
  beforeMount() {
    const id = this.$route.params.id;
    if(id) {
      this.$store.dispatch('order/getOrder', id)
    }
  },
  computed: {
    order() {
      return this.$store.state.order.order;
    }
  }
}

</script>