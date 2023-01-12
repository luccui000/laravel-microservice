<template>
  <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;">
  <div class="mfp-container mfp-s-ready mfp-inline-holder">
    <div class="mfp-content ">
      <div id="sizechart" class="">
        <h3>BẢNG KÍCH CỠ CƠ THỂ NỮ</h3>
        <table>
          <tbody>
            <tr>
              <th>Kích cỡ</th>
              <th>XS</th>
              <th>S</th>
              <th>M</th>
              <th>L</th>
              <th>XL</th>
            </tr>
            <tr>
              <td>Ngực</td>
              <td>31" - 33"</td>
              <td>33" - 35"</td>
              <td>35" - 37"</td>
              <td>37" - 39"</td>
              <td>39" - 42"</td>
            </tr>
            <tr>
              <td>Thắt lưng</td>
              <td>24" - 26"</td>
              <td>26" - 28"</td>
              <td>28" - 30"</td>
              <td>30" - 32"</td>
              <td>32" - 35"</td>
            </tr>
            <tr>
              <td>Hông</td>
              <td>34" - 36"</td>
              <td>36" - 38"</td>
              <td>38" - 40"</td>
              <td>40" - 42"</td>
              <td>42" - 44"</td>
            </tr>
            <tr>
              <td>Đường may thông thường</td>
              <td>30"</td>
              <td>30½"</td>
              <td>31"</td>
              <td>31½"</td>
              <td>32"</td>
            </tr>
            <tr>
              <td>Đường may dài</td>
              <td>31½"</td>
              <td>32"</td>
              <td>32½"</td>
              <td>33"</td>
              <td>33½"</td>
            </tr>
          </tbody>
        </table>
        <h3>Bảng kích cỡ cơ thể nam</h3>
        <table>
          <tbody>
            <tr>
              <th>Kích cỡ</th>
              <th>XS</th>
              <th>S</th>
              <th>M</th>
              <th>L</th>
              <th>XL</th>
              <th>XXL</th>
            </tr>
            <tr>
              <td>Ngực</td>
              <td>33" - 36"</td>
              <td>36" - 39"</td>
              <td>39" - 41"</td>
              <td>41" - 43"</td>
              <td>43" - 46"</td>
              <td>46" - 49"</td>
            </tr>
            <tr>
              <td>Thắt lưng</td>
              <td>27" - 30"</td>
              <td>30" - 33"</td>
              <td>33" - 35"</td>
              <td>36" - 38"</td>
              <td>38" - 42"</td>
              <td>42" - 45"</td>
            </tr>
            <tr>
              <td>Hông</td>
              <td>33" - 36"</td>
              <td>36" - 39"</td>
              <td>39" - 41"</td>
              <td>41" - 43"</td>
              <td>43" - 46"</td>
              <td>46" - 49"</td>
            </tr>
          </tbody>
        </table> 
        <button 
          title="Đóng cửa sổ (Esc)" 
          type="button" 
          class="mfp-close"
          @click="closeWindow"
        >×</button>
      </div>
    </div>
    <div class="mfp-preloader">Loading...</div>
  </div>
</div>
</template>

<script>

export default {
  name: 'SizeGuide',
  props: ['isShow'],
  methods: {
    closeWindow() {
      this.$emit('close')
    }
  }
}
</script>

<style>
.mfp-container {
  background-color: rgba(0, 0, 0, 0.3);
}
</style>