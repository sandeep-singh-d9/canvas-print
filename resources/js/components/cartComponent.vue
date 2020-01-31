<template>
  <div>
    <div>{{canvasHeight + 'x' + canvasWidth + 'inches'}}</div>
    <div>Edge: {{ imageType }}</div>
    <div>
      <input type="number" name="quentity" v-model="quentity" />
    </div>
    <div>
        Price : $20
    </div>
    <div>
        <router-link to="/">Edit</router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      canvasHeight: "",
      canvasWidth: "",
      imagePath: "",
      color: "",
      zoomValue: "",
      imageType: "",
      canvasType: "",
      translateData: "",
      imageStyle: "",
      quentity: 1
    };
  },
  mounted() {
    let cartData = JSON.parse(localStorage.getItem("cart"));
    this.canvasHeight = cartData.canvasHeight;
    this.canvasWidth = cartData.canvasWidth;
    this.imagePath = cartData.imagePath;
    this.color = cartData.color;
    this.zoomValue = cartData.zoomValue;
    this.imageType = cartData.imageType;
    this.canvasType = cartData.canvasType;
    this.translateData = cartData.translateData;
    this.imageStyle = cartData.imageStyle;
  }
};
</script>

<style>
</style>