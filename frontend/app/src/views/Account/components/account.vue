<template>
  <div>
    <h3>Account</h3>
    <hr>
    <div class="row">
      <div class="col-6 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="first_name">Họ</label>
          <input v-model="user.first_name" type="text" :readonly="!isEdit" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="last_name">Tên</label>
          <input v-model="user.last_name" type="text" value="" :readonly="!isEdit" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input v-model="user.email" type="text" readonly >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="phone">Số điện thoại</label>
          <input v-model="user.phone" type="text" value="" :readonly="!isEdit" >
        </div>
      </div>
    </div>
    <button v-if="!isEdit" @click="edit" class="btn">Cập nhật</button>
    <button v-else @click="save" class="btn">Lưu</button>
  </div>
</template>


<script>

export default {
  name: 'AccountComponent',
  data() {
    return {
      user: {
        first_name: '',
        last_name: '',
        email: '',
        phone: ''
      },
      isEdit: false
    }
  },
  mounted() {
    const account = this.$store.getters['auth/user'];
    this.user = {
      first_name: account.first_name,
      last_name: account.last_name,
      email: account.email,
      phone: account.phone,
    };
  },
  methods: {
    edit() {
      this.isEdit = true;
    },
    save() {
      this.$store.dispatch('auth/updateProfile', this.user)
        .then(() => {
          this.isEdit = false; 
        })
        .catch(error => {
          console.log(error)
        })
    }
  }
}

</script>