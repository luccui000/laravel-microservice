<template>
  <div class="modal fade quick-view-popup show" style="display: block; padding-right: 15px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <slot></slot>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'QuickView',
  props: ['product'],
  data() {
    return {}
  }
}

</script>