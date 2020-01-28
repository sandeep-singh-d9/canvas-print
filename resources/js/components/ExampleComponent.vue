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
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageUploadModal" > Upload Image</button> -->
                    <input type="file" class="form-control"  name="image" @change="onImageChange" />
                    <!-- <canvas @mousedown="dragStart()" @click="dragStart()" id='canvas' :style="{width:selectedWidth+'px', height:selectedHeight+'px', cursor:'all-scroll'}">
                        Sorry, your browser does not support the canvas tag.
                    </canvas> -->
                </div>
            </div>
        </div>
        <div class="print-preview" style="display: inline-block; width: 420px; height: 420px;">
	<div class="edit-text ui-draggable ui-draggable-handle" style="display: none; position: relative;"><i class="fa fa-trash" aria-hidden="true"></i>
	</div>
        <div class="orientation" style="display: block;">&nbsp;</div>
        <div class="preview-img">
            <div id="design_tool" style="left:20px;  position: relative; top:20px;">
                <div class="canvas-container" id="canvas_container_1" style="width: 380px; height: 380px; position:absolute!important; -moz-user-select: none; left: 0px; top: 0px;">
                    <div class="canvas-container" style="width: 380px; height: 380px; position: relative; user-select: none;">
                        <!-- <img style="width:380px; height:380px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg/1200px-Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg" alt=""> -->
                        <canvas @mousedown="dragStart()" @click="dragStart()" id='canvas' :style="{width:selectedWidth+'px', height:selectedHeight+'px', cursor:'all-scroll'}">
                            Sorry, your browser does not support the canvas tag.
                        </canvas>
                        <!-- <canvas class="upper-canvas workArea canvas-transition maincanvas" width="380" height="380" style="position: absolute; width: 380px; height: 380px; border: 1px solid rgb(204, 204, 204); left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas> -->
                    </div>
                </div>
                <div class="demo-image" dropcanvasid="canvas_1" style="display: block;width: 380px;height: 380px;">
                    <div class="demo-image-default"><a><i class="fa fa-upload" aria-hidden="true"></i>Upload an Image</a><span>Maximum upload size: 25MB per file</span>
                    </div>
                </div>
                <div class="canvas-container sidecanvas" id="canvas_container_left_1" style="width: 20px; height: 380px; position:absolute!important; -moz-user-select: none; left: -20px; top: 0px; pointer-events:none;">
                    <div class="canvas-container" style="width: 20px; height: 380px; position: relative; user-select: none;">
                        <img style="width:20px; height:380px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg/1200px-Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg" alt="">
                        <canvas class="upper-canvas workArea canvas-transition" width="20" height="380" style="position: absolute; width: 20px; height: 380px; border-top: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204); border-left: 1px solid rgb(204, 204, 204); border-image: initial; border-right: none; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
                    </div>
                </div>
                <div class="canvas-container sidecanvas" id="canvas_container_top_1" style="width: 380px; height: 20px; position:absolute!important; -moz-user-select: none; left: 0px; top: -20px; pointer-events:none;">
                    <div class="canvas-container" style="width: 380px; height: 20px; position: relative; user-select: none;">
                        <img style="width:380px; height:20px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg/1200px-Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg" alt="">
                        <canvas class="upper-canvas workArea canvas-transition" width="380" height="20" style="position: absolute; width: 380px; height: 20px; border-top: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); border-left: 1px solid rgb(204, 204, 204); border-image: initial; border-bottom: none; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
                    </div>
                </div>
                <div class="canvas-container sidecanvas right-shade" id="canvas_container_right_1" style="width: 20px; height: 380px; position:absolute!important; -moz-user-select: none; left: 380px; top: 0px; pointer-events:none;">
                    <div class="canvas-container" style="width: 20px; height: 380px; position: relative; user-select: none;">
                        <img style="width:20px; height:380px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg/1200px-Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg" alt="">
                        <canvas class="upper-canvas workArea canvas-transition right-shade" width="20" height="380" style="position: absolute; width: 20px; height: 380px; border-top: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204); border-image: initial; border-left: none; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
                    </div>
                </div>
                <div class="canvas-container sidecanvas bottom-shade" id="canvas_container_bottom_1" style="width: 380px; height: 20px; position:absolute!important; -moz-user-select: none; left: 0px; top: 380px; pointer-events:none;">
                    <div class="canvas-container" style="width: 380px; height: 20px; position: relative; user-select: none;">
                        <img style="width:380px; height:20px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg/1200px-Ponta_de_S%C3%A3o_Louren%C3%A7o_north_north_east.jpg" alt="">
                        <canvas class="upper-canvas workArea canvas-transition bottom-shade" width="380" height="20" style="position: absolute; width: 380px; height: 20px; border-right: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204); border-left: 1px solid rgb(204, 204, 204); border-image: initial; border-top: none; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="image-container">
        <img id="drag-image" :src="userImage"  />
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="imageUploadModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <imageUploadComponent></imageUploadComponent>
            </div>
        </div>
    </div>
    <button @click="imageUpload">UploadImage</button>
    </div>
</template>

<script>
import * as filestack from 'filestack-js';
const client = filestack.init('AzESQpbNMRkulCa1DzhIPz');
    import imageUploadComponent from './common/imageUploadComponent.vue';
    export default {
        components:{
            imageUploadComponent
        },
        mounted() {
            console.log('Component mounted.')
            var _DRAGGGING_STARTED = 0;
            var _LAST_MOUSEMOVE_POSITION = { x: null, y: null };
            var _DIV_OFFSET = $('#image-container').offset();
            var _CONTAINER_WIDTH = $("#image-container").outerWidth();
            var _CONTAINER_HEIGHT = $("#image-container").outerHeight();
            var _IMAGE_WIDTH;
            var _IMAGE_HEIGHT;
            var _IMAGE_LOADED = 0;
            var _LAST_MOUSE_POSITION;

            // Check whether image is cached or wait for the image to load 
            // This is necessary before calculating width and height of the image
            if($('#drag-image').get(0).complete) {
                ImageLoaded();
            }
            else {
                $('#drag-image').on('load', function() {
                    ImageLoaded();
                });
            }

            // Image is loaded
            function ImageLoaded() {
                _IMAGE_WIDTH = $("#drag-image").width();
                _IMAGE_HEIGHT = $("#drag-image").height();
                _IMAGE_LOADED = 1;	
            }

            $('#image-container').on('mousedown', function(event) {
                /* Image should be loaded before it can be dragged */
                if(_IMAGE_LOADED == 1) { 
                    _DRAGGGING_STARTED = 1;

                    /* Save mouse position */
                    _LAST_MOUSE_POSITION = { x: event.pageX - _DIV_OFFSET.left, y: event.pageY - _DIV_OFFSET.top };
                }
            });

            $('#image-container').on('mouseup', function() {
                _DRAGGGING_STARTED = 0;
            });

            $('#image-container').on('mousemove', function(event) {
                if(_DRAGGGING_STARTED == 1) {
                    var current_mouse_position = { x: event.pageX - _DIV_OFFSET.left, y: event.pageY - _DIV_OFFSET.top };
                    var change_x = current_mouse_position.x - _LAST_MOUSE_POSITION.x;
                    var change_y = current_mouse_position.y - _LAST_MOUSE_POSITION.y;

                    /* Save mouse position */
                    _LAST_MOUSE_POSITION = current_mouse_position;

                    var img_top = parseInt($("#drag-image").css('top'), 10);
                    var img_left = parseInt($("#drag-image").css('left'), 10);

                    var img_top_new = img_top + change_y;
                    var img_left_new = img_left + change_x;

                    /* Validate top and left do not fall outside the image, otherwise white space will be seen */
                    if(img_top_new > 0)
                        img_top_new = 0;
                    if(img_top_new < (_CONTAINER_HEIGHT - _IMAGE_HEIGHT))
                        img_top_new = _CONTAINER_HEIGHT - _IMAGE_HEIGHT;

                    if(img_left_new > 0)
                        img_left_new = 0;
                    if(img_left_new < (_CONTAINER_WIDTH - _IMAGE_WIDTH))
                        img_left_new = _CONTAINER_WIDTH - _IMAGE_WIDTH;

                    $("#drag-image").css({ top: img_top_new + 'px', left: img_left_new + 'px' });
                }
            });
            
        },
        data(){
            return {
                selectedHeight: '380',
                selectedWidth: '380',
                isDraggable: false,
                currentX: 0,
                currentY: 0,
                userImage :''
            }
        },
        methods:{
            imageUpload(){
                const options = {
                    onUploadDone:updateForm,
                };
                const picker = client.picker(options);
                picker.open();
                const self = this 
                function updateForm(result){
                    console.log(result, 'asasassa')
                }
            },
            updateForm(result){
                const fileData = result.filesUploaded[0];
                //  fileInput.value = fileData.url;
                console.log(fileData)
            },
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
            onImageChange(e){
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.uploadImage(files);
            },
            uploadImage(imageData){
                var data = new FormData()
                var file = imageData[0]
                data.append('image', file)
                axios.post('/api/imageUpload',data)
                .then(response => {
                    this.userImage = response.data.image
                    // this.insertImage()
                }).catch(error => {
                    console.log(error)
                })
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
                        self.currentX = e.pageX - canvas.offsetLeft;
                        self.currentY = e.pageY - canvas.offsetTop;
                    }
                };
                canvas.onmouseup = function(e) {
                    console.log('up')
                    self.isDraggable = false;
                };
                canvas.onmouseout = function(e) {
                    self.isDraggable = false;
                };
                canvas.mousedown = function(e) {
                    console.log('down')
                    self.isDraggable = true;
                };
            },
            DrawImage(){
                var  canvas = document.getElementById("canvas");
                var context = canvas.getContext("2d");
                var image = new Image();
                image.src = 'https://www.scitecheuropa.eu/wp-content/uploads/2019/09/Colour-bird-e1568033112774.jpg';
                const self = this;
                // console.log(image.naturalWidth/image.naturalHeight, 'sasas' , self.selectedWidth/self.selectedHeight)
                // ctx.drawImage(image, 0, 0, image.naturalWidth, image.naturalHeight, 0, 0, self.selectedWidth, self.selectedHeight);
                context.drawImage(image, self.currentX-(image.width/2), self.currentY-(image.height/2));
                
            }
        }
    }
</script>
<style >
canvas {
  /*Add a border around canvas for legibility*/
  border: 1px solid grey;
}
#image-container {
	display: block;
	height: 300px;
	width: 300px;
	margin: 40px auto;
	overflow: hidden;
	border: 1px solid #cccccc;
	box-sizing: border-box;
	position: relative;
	cursor: move;
}

#drag-image {
	left: 0;
	pointer-events: none;
	top: 0;
	-moz-user-select: none;
    height:500px;
    width:auto;
}
</style>