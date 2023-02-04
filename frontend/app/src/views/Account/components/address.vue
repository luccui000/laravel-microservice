<template>
  <div>
    <h3>Danh sách địa chỉ</h3>
    <hr />
    <div>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="first_name">Tỉnh/Thành phố</label>
            <select class="" v-model="province">
              <option v-if="user.country" selected="selected">{{ user.country }}</option>
              <option
                v-for="province in provinces"
                :key="province.id"
                :value="province.id"
                :selected="user.country === province.name"
              >
                {{ province.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="first_name">Quận/huyện</label>
            <select class="" v-model="district"> 
              <option
                v-for="district in districts"
                :key="district.id"
                :value="district.id"
              >
                {{ district.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="first_name">Phường/xã</label>
            <select class="" v-model="ward">
              <option
                v-for="ward in wards"
                :key="ward.id"
                :value="ward.id"
              >
                {{ ward.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="first_name">Địa chỉ 1</label>
            <textarea v-model="address.address_1" rows="3"></textarea>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="first_name">Địa chỉ 2</label>
            <textarea v-model="address.address_2" rows="3"></textarea>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <button @click="update" class="btn">Cập nhật</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'AddressComponent',
  data() {
    return {
      provinces: [],
      districts: [],
      wards: [], 
      province: null,
      district: null,
      ward: null,
      address: {
        city: '',
        country: '',
        address_1: '',
        address_2: '',
      }
    };
  },
  mounted() {
    this.getProvince();
    const user = this.getUser();
    this.address.address_1 = user.address_1;
    this.address.address_2 = user.address_2;
  },
  methods: {
    getProvince() {
      this.$store.dispatch('address/provinces')
        .then(provinces => {
          this.provinces = provinces;
        })
    },
    getDistrict(value) {
      this.$store.dispatch('address/districts', value)
        .then(districts => {
          this.districts = districts;
        })
    },
    getWard(value) {
      this.$store.dispatch('address/wards', value)
        .then(wards => {
          this.wards = wards;
        })
    },
    getUser() {
      return this.$store.getters['auth/user'];
    },
    update() {
      const city = this.districts.filter(el => el.id === this.district)
      const country = this.provinces.filter(el => el.id === this.province);
      if(city.length) {
        this.address.city = city[0].name;
      }

      if(country.length) {
        this.address.country = country[0].name;
      }
      
      this.$store.dispatch('auth/updateAddress', this.address);
    }
  },
  computed: {
    user() { 
      return this.getUser();
    }
  },
  watch: {
    province: {
      handler(value, oldValue)  {
        if(value !== oldValue)  {
          this.wards = [];
          this.districts = [];
          this.getDistrict(value);
        }
      }, deep: true
    },
    district: {
      handler(value)  {
        this.getWard(value);
      }, deep: true
    }
  }
}

</script>