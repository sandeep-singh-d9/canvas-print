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
                    <canvas @click="dragStart()" id='canvas' :style="{width:selectedWidth+'px', height:selectedHeight+'px', cursor:'all-scroll'}">
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
                selectedWidth: '380',
                isDraggable: false,
                currentX: 0,
                currentY: 0
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
                this.currentX = canvas.width/2;
                this.currentY = canvas.height/2;
                // Create a new image object
                var image = new Image();

                // Callback, executed when the image is loaded
                // See previous video for a more flexible solution 
                const self = this
                image.onload = function(){
                self.Go()
                // Select a rectangle from the source image,
                // and then draw is as normal.
                // ctx.drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight);
                // (image, srcX, srcY, srcWidth, srcHeight, x, y, width, height)
                // console.log(image.naturalWidth/image.naturalHeight, 'sasas' , self.selectedWidth/self.selectedHeight)
                // ctx.drawImage(image, 0, 0, image.naturalWidth, image.naturalHeight, 0, 0, self.selectedWidth, self.selectedHeight);
                }

                // Start our image loading
                image.src = '/images/career_bg.jpg';
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
            },
            Go(){
                this.MouseEvents();
                const self = this
                setInterval(function() {
                    self.ResetCanvas();
                    self.DrawImage();
                }, 1000/30);
            },
            dragStart(){
                this.isDraggable = true
            },
            ResetCanvas(){
                var canvas = document.getElementById('canvas');
                var ctx = canvas.getContext('2d');
                ctx.fillStyle = '#fff';
                ctx.fillRect(0,0, canvas.width, canvas.height)
            },
            MouseEvents(){
                var canvas = document.getElementById('canvas');
                var currentX = canvas.width/2;
                var currentY = canvas.height/2;
                const self = this
                var image = new Image();
                canvas.onmouseover = function(e) {
                    console.log(this)
                    var mouseX = e.pageX - this.offsetLeft;
                    var mouseY = e.pageY - this.offsetTop;
                    if (mouseX >= (self.currentX - image.width/2) &&
                        mouseX <= (self.currentX + image.width/2) &&
                        mouseY >= (self.currentY - image.height/2) &&
                        mouseY <= (self.currentY + image.height/2)) {
                    self.isDraggable = true;
                    //currentX = mouseX;
                    //currentY = mouseY;
                    }
                };
                canvas.onmousemove = function(e) {
                    if (self.isDraggable) {
                    console.log('sasas')
                    self.currentX = e.pageX - this.offsetLeft;
                    self.currentY = e.pageY - this.offsetTop;
                    }
                };
                canvas.onmouseup = function(e) {
                    self.isDraggable = false;
                };
                canvas.onmouseout = function(e) {
                    self.isDraggable = false;
                };
            },
            DrawImage(){
                var  canvas = document.getElementById("canvas");
                var context = canvas.getContext("2d");
                var image = new Image();
                image.src = '/images/career_bg.jpg';
                const self = this;
                // console.log(image.naturalWidth/image.naturalHeight, 'sasas' , self.selectedWidth/self.selectedHeight)
                // ctx.drawImage(image, 0, 0, image.naturalWidth, image.naturalHeight, 0, 0, self.selectedWidth, self.selectedHeight);
                context.drawImage(image, self.currentX-(image.width/2), self.currentY-(image.height/2));
                
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