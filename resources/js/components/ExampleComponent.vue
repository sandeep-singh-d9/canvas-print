<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <select v-model="selectedWidth" @change="getContext">
                        <option value="380">8</option>
                        <option value="390">9</option>
                        <option value="400">10</option>
                        <option value="410">11</option>
                    </select>
                    <select v-model="selectedHeight" @change="getContext">
                        <option value="380">8</option>
                        <option value="390">9</option>
                        <option value="400">10</option>
                        <option value="410">11</option>
                    </select>
                    <button @click="insertImage"> ADD Image</button>
                    <canvas @mousemove="getmove($event)" id='canvas' :style="{width:selectedWidth+'px', height:selectedHeight+'px', cursor:'all-scroll'}">
                        Sorry, your browser does not support the canvas tag.
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            
        },
        data(){
            return {
                selectedHeight: '380',
                selectedWidth: '380'
            }
        },
        methods:{
            insertImage(){
                // Cache a reference to the html element
                var canvas = document.getElementById('canvas');

                // Set the drawing surface dimensions to match the canvas
                canvas.width  = canvas.scrollWidth;
                canvas.height = canvas.scrollHeight;

                // Get a reference to the 2d drawing context / api
                var ctx = canvas.getContext('2d');
                // Create a new image object
                var image = new Image();

                // Callback, executed when the image is loaded
                // See previous video for a more flexible solution 
                const self = this
                image.onload = function(){

                // Select a rectangle from the source image,
                // and then draw is as normal.
                // ctx.drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight);
                // (image, srcX, srcY, srcWidth, srcHeight, x, y, width, height)
                console.log(image.naturalWidth/image.naturalHeight, 'sasas' , self.selectedWidth/self.selectedHeight)
                ctx.drawImage(image, 0, 0, image.naturalWidth, image.naturalHeight, 0, 0, self.selectedWidth, self.selectedHeight);
                }

                // Start our image loading
                image.src = '/images/career_bg.jpg';
                console.log(image, 'sasas')
            },
            getContext(){
                console.log(this.selectedHeight , this.selectedWidth)
                this.insertImage()
            },
            getmove(e){
                console.log(e, 'sasas')
                var canvas = document.getElementById('canvas');

                // // Set the drawing surface dimensions to match the canvas
                // canvas.width  = canvas.scrollWidth;
                // canvas.height = canvas.scrollHeight;

                // Get a reference to the 2d drawing context / api
                var ctx = canvas.getContext('2d');
                // Create a new image object
                var img = new Image();
                img.src = '/images/career_bg.jpg';
                var x = -1 * (img.width - canvas.width) / 2 * (1 + Math.cos(e.clientX / Math.PI));
                var y = -1 * (img.height - canvas.height) / 2 * (1 + -Math.sin(e.clientY / Math.PI));
                const self = this
                ctx.drawImage(img, x, y);
                ctx.moveTo(x, y); 
                // ctx.drawImage(img, 0, 0, self.selectedWidth, self.selectedHeight, x, y, self.selectedWidth, self.selectedHeight);
            }
        }
    }
</script>
<style>

canvas {
  /*Add a border around canvas for legibility*/
  border: 1px solid grey;
}
</style>