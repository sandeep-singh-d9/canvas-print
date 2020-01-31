<template>
    <div class="builder container right_div">
        <div class="row m-0">
            <div class="col-lg-6 p-5 mt-3 mirrored canvasImage">
                <div class="mainimage__preview wrapped" :style="{opacity: '1', width: selectedHeight+'px'}">
                    <div class="h-scale" :style="{marginLeft: '20px', width: dynamicWidth}"><span id="scalewidth">{{selectedCanvasWidth}} inch</span></div>
                    <div class="v-scale" :style="{marginTop: '20px', height: dynamicHeight}"><span id="scaleheight">{{selectedCanvasHeight}} inch</span></div>
                    <div class="image__preview_section" :style="{paddingLeft: '20px', width: topWrapWidth+40+'px'}">
                        <div class="image__preview_top" :style="{height: '20px', width:dynamicWidth, opacity:imageType != 'roleCanvas' ? '1': '0'}">
                            <div class="innerimage_window" :style="{width: '100%', height: 'auto',  paddingTop:dynamicHeight}">
                                <div class="innerimage_canvas" style="top:0; left:-2px" :style="{ backgroundColor: imageType == 'color' ?  color : ''}">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath"  v-show="imageType != 'color'"  :style="{width:imageWidth, height:imageHeight}" >
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_right" :style="{height: dynamicHeight, width: '20px', opacity:imageType != 'roleCanvas' ? '1': '0'}">
                            <div class="innerimage_window" :style="{height: dynamicHeight, width: dynamicWidth, paddingTop:dynamicHeight}">
                                <div class="innerimage_canvas" style="top:-1px; right:0;left: auto;" :style="{ backgroundColor: imageType == 'color' ?  color : ''}">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath"  v-show="imageType != 'color'"  :style="{marginLeft: '0px', width:imageWidth, height:imageHeight}">
                                </div>
                            </div>
                        </div>

                        <div class="image__preview wrapper" :class="{'borderdotted': imageType == 'roleCanvas'}"  :style="{width:dynamicWidth,height:dynamicHeight }">
                            <div class="innerimage_window" :style="{width: '100%', height: 'auto' ,paddingTop:dynamicHeight, cursor:'all-scroll'}" >
                                <div  class="innerimage_canvas map" style="top:0; left:0">
                                    <img class="image__preview_main transform-after-drag" :src="imagePath" :style="{width:imageWidth, height:imageHeight}" >
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_bottom" :style="{height: '20px', width: dynamicWidth, opacity:imageType != 'roleCanvas' ? '1': '0'}">
                            <div class="image__preview_bottom-inner">
                                <div class="innerimage_window" :style="{width:'100%', height:'auto',  paddingTop:bottomImageHeight-5+'px'}">
                                    <div class="innerimage_canvas" style="top:-5px; left:0" :style="{ backgroundColor: imageType == 'color' ?  color : ''}">
                                        <img class="image__preview_image transform-after-drag" :src="imagePath"  v-show="imageType != 'color'"  :style="{marginTop: '0px', width:imageWidth, height:imageHeight}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_left" :style="{height: dynamicHeight, width: '20px', top: '20px', opacity:imageType != 'roleCanvas' ? '1': '0'}">
                            <div class="innerimage_window" :style="{width:dynamicWidth,height:dynamicHeight, paddingTop:'100%'}">
                                <div class="innerimage_canvas" style="top:-2px; left:0" :style="{ backgroundColor: imageType == 'color' ?  color : ''}">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath"  v-show="imageType != 'color'"  :style="{width:imageWidth, height:imageHeight}" >
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
                <br/>
                <br/>
                <br/>
                <div class="float-left col-md-12 p-0 mb-4 mt-3 text-center ">
                    <button @click="imageUpload" class="btn canvas_btn">UploadImage</button>
                    <button @click="addToCart" class="btn canvas_btn">Add to cart</button>
                </div>
            </div>
            <div class="col-lg-6 pl-3 right_div">
                <h2>Upload & Adjust</h2>
                <hr/>
                <div class="col-sm-12 p-0 mb-3 float-left" >
                    <label><b>Size (H x W)</b></label>
                    <div class=" col-md-8 float-right">
                        <div class="row">
                            <div class="col-lg-4 pr-0">
                                <select v-model="selectedCanvasHeight" @change="getContext" class="form-control">
                                    <option v-for="(item,index) in optionHeight" :key="index" :value="item">{{item}}</option>
                                </select>
                            </div>
                            <div class="col-lg-2 p-0 text-center pt-2"><label><b> X </b></label></div>
                            <div class="col-lg-4 pl-0">
                                <select v-model="selectedCanvasWidth" @change="getContext" class="form-control">
                                    <option v-for="(item,index) in optionWidth" :key="index" :value="item">{{item}}</option>
                                </select>
                            </div>
                            <div class="col-lg-2 p-0 text-center pt-2"><label><b> (Inches) </b></label></div>
                        </div>
                    </div>
                </div>
                
                <div class="float-left col-md-12 p-0 right_circleimg">
                    <label><b>CANVAS WRAP</b></label>
                    <ul>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : canvasType == 'gallerywrap' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="canvasType" v-model="canvasType" value="gallerywrap">
                                </div>
                                <label>Gallery Wrap 0.75</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : canvasType == 'gallerywrap1' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="canvasType" v-model="canvasType" value="gallerywrap1">
                                </div>
                                <label>Gallery Wrap 1.25</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : canvasType == 'roleCanvas' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="canvasType" v-model="canvasType" value="roleCanvas">
                                </div>
                                <label>Rolled Canvas</label>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="float-left col-md-12 p-0 right_circleimg">
                    <label><b>CANVAS EDGING</b></label>
                    <ul>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : imageType == 'mirror' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="imageType" v-model="imageType" value="mirror">
                                </div>
                                <label>Mirrored Edge</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : imageType == 'wrap' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="imageType" v-model="imageType" value="wrap">
                                </div>
                                <label>Wrapped Edge</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div :class="{'inner_image': true , 'active' : imageType == 'color' ? true : false  }"  >
                                    <img src="" alt="" title="">
                                    <input type="radio" class="radio_selected" name="imageType" v-model="imageType" value="color"> 
                                </div>
                                <label>Colored Edge</label>
                            </a>
                        </li>
                    </ul>
                    <hr/>
                </div>

                <div class="row mb-4"> </div>
                <vue-slider v-model="zoomValue" @change="zoomChange"></vue-slider>
                <color-picker v-model="color" v-show="imageType == 'color'"></color-picker>
            </div>
        </div>
        <div>     
        </div>
  </div>
</template>

<script>
import {
    mapState,
    mapActions,
    mapGetters,
    mapMutations
} from 'vuex';
import gsap from "gsap";
// or get other plugins:
import Draggable from "gsap/Draggable";
gsap.registerPlugin( Draggable); 
import * as filestack from 'filestack-js';
const client = filestack.init('AM1a9ROU8QaeWoGfG7ZALz');
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/material.css'
export default {
    data(){
        return {
            selectedHeight: '420',
            selectedWidth: '380',
            topWrapWidth:380,
            selectedCanvasHeight: '',
            selectedCanvasWidth: '',
            dynamicWidth:'380',
            dynamicHeight:'380',
            bottomImageHeight:'380',
            imagePath:'',
            imageHeight: '',
            imageWidth: '',
            fileStatckImageWidth: '',
            fileStatckImageHeight: '',
            color:'',
            zoomValue:'',
            imageType : '',
            savedMainImageStyle:'',
            optionHeight:[],
            optionWidth:[],
            canvasType:'',
            translateData:'',
            allImageStyle :''

        }
    },
    components: {
        VueSlider
    },
    mounted(){
        console.log(process.env.MIX_FILESTACK_KEY)
        let cartData = JSON.parse(localStorage.getItem("cart"));
        if(cartData != undefined){
            this.editValue(cartData)
        }
        this.layoutModify()
        const self = this
            Draggable.create(".map img", {
                type:"x,y",
                    bounds:".wrapper",
                    // edgeResistance:1,
                    onDrag:yourFunction,
                    onRelease:self.releaseDragEvents
            });
            function yourFunction(e){
                let translate = e.target.style.transform
                self.translateData = translate
                self.changeTansslate(translate)
                this.savedMainImageStyle = e.target.style.cssText
                if(e.target.style.width != ''){
                    $('.transform-after-drag').attr('style',e.target.style.cssText)
                }else{
                    if($('.map img')[0].style){

                    }
                }
                if(self.zoomValue != ''){
                    let scale = 1 + parseFloat(self.zoomValue * 0.03)
                    $('.image__preview_main').css('transform','scale(' + scale + ')'+translate)
                    $('.image__preview_image').css('transform','scale(' + scale + ')'+translate)
                }
            }
            this.optionHeight = [];
            this.optionWidth = [];
            for (let index = 8; index <= 55; index++) {
                this.optionHeight.push(index)                
                this.optionWidth.push(index)                
            }

        // $('.transform-after-drag').attr('style',cartData.imageStyle)
    },
    computed: {
        ...mapState([ 
            'widthHeightSelect',
            'customHeight',
            'customWidth'
        ])
    },
    methods:{
        ...mapActions([
            'ACTION_CHANGE_STATE',
        ]),
        editValue(cartData){
            this.selectedCanvasHeight = cartData.canvasHeight;
            this.selectedCanvasWidth = cartData.canvasWidth;
            this.imagePath = cartData.imagePath;
            this.color = cartData.color;
            this.zoomValue = cartData.zoomValue;
            this.imageType = cartData.imageType;
            this.canvasType = cartData.canvasType;
            this.translateData = cartData.translateData;
            this.allImageStyle = cartData.imageStyle;
            $('.transform-after-drag').attr('style','')
            $('.transform-after-drag').attr('style',cartData.imageStyle)
        },
        addToCart(){
            localStorage.removeItem('cart')
            let data = {
                canvasHeight : this.selectedCanvasHeight,
                canvasWidth : this.selectedCanvasWidth,
                imagePath : this.imagePath,
                color : this.color,
                zoomValue : this.zoomValue ,
                imageType : this.imageType,
                canvasType : this.canvasType,
                translateData : this.translateData,
                imageStyle : $('.transform-after-drag').attr('style')
            }
            localStorage.setItem('cart',JSON.stringify(data));
            this.$router.push('cart');
        },
        changeTansslate(translate){
            this.translateData = translate
        },
        zoomChange(){
            let scale = 1 + parseFloat(this.zoomValue * 0.03)
            $('.image__preview_main').css('transform','scale(' + scale + ')'+this.translateData)
            $('.image__preview_image').css('transform','scale(' + scale + ')'+this.translateData)
        },
        releaseDragEvents(){
            // if($('.image__preview_main')[0].style[5] == undefined){
            //   location.reload()
            // }
        },
        imageUpload(){
            const options = {
                onUploadDone:updateForm,
                onFileSelected:checkImgSize,
                exposeOriginalFile:true,
                onFileUploadFinished:fileSuccessUpload
            };
            const picker = client.picker(options);
            picker.open();
            const self = this 
            function updateForm(result){
                console.log(result, 'asasassa')
                const fileData = result.filesUploaded[0];
                self.imagePath = fileData.url;
            }
            function selectedImageDimension(e){
                console.log(e, 'sasasasasa')
            }
            function checkImgSize (file) {
                return new Promise(function (resolve, reject) {
                    const maxWidth = 1300;
                    const maxHeight = 1300;
                    const blob = file.originalFile;

                    // Get an object URL for the local file
                    const url = URL.createObjectURL(blob);

                    // Create an image and load the object URL
                    const img = new Image();
                    img.src = url;

                    img.onload = function () {
                    URL.revokeObjectURL(url);
                    console.log(this.naturalWidth , this.naturalHeight)
                    self.fileStatckImageWidth = this.naturalWidth
                    self.fileStatckImageHeight = this.naturalHeight
                    // if (this.naturalWidth > maxWidth) {
                    //     reject('File is too wide');
                    // }

                    // if (this.naturalHeight > maxHeight) {
                    //     reject('File is too tall');
                    // }

                    // If we made it here then the file was approved
                    resolve();
                    }
                });
            }
            function fileSuccessUpload(){
                // if(self.fileStatckImageHeight > self.fileStatckImageWidth){
                //     self.imageHeight='auto !important' 
                //     self.imageWidth='100% !important' 
                // }else if (self.fileStatckImageWidth > self.fileStatckImageHeight){
                //     self.imageHeight='100% !important' 
                //     self.imageWidth='auto !important'
                // }else{
                //     self.imageHeight='auto !important' 
                //     self.imageWidth='100% !important'
                // }
                self.layoutModify()
            }

        },
        getContext(){
            console.log(this.selectedHeight , this.selectedWidth)
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            
            if(this.allImageStyle != ''){
                alert('in')
                console.log(this.allImageStyle)
                $('.transform-after-drag').attr('style','')
                $('.transform-after-drag').attr('style',this.allImageStyle)
            }else{
                alert('else')
                $('.transform-after-drag').css('transform', 'translate3d(0px, 0px, 0px)')
            }
            if(this.selectedCanvasHeight == '' && this.selectedCanvasWidth == ''){
                this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
                this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            }
            
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                this.dynamicWidth = '380px'
                this.dynamicHeight = '380px'
                this.topWrapWidth = 380
                if(this.fileStatckImageHeight == this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                }else if(this.fileStatckImageHeight < this.fileStatckImageWidth){
                    this.imageHeight=this.dynamicHeight+'!important' 
                    this.imageWidth='auto !important'
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                }
                
                // $('.transform-after-drag').attr('style',e.target.style.cssText)
                /*For bottom image */
                this.bottomImageHeight = 380
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                console.log(this.selectedCanvasWidth, this.selectedCanvasHeight)
                this.dynamicWidth = '380px'
                this.dynamicHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                this.topWrapWidth = 380 
                /*For bottom image */
                this.bottomImageHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='380px !important' 
                }else if (this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='380px !important' 
                    this.imageWidth='auto !important' 
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='380px !important' 
                }
                console.log(this.dynamicHeight, 'asas')
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                this.dynamicHeight = '380px'
                this.dynamicWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                this.topWrapWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                this.bottomImageHeight = 380
                console.log(this.fileStatckImageHeight, 'asasasasasaasasa', this.fileStatckImageWidth)
                if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='380px !important' 
                    this.imageWidth='auto !important' 
                    console.log('asas')
                }else if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    if(this.selectedCanvasHeight > this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth=this.dynamicWidth 
                        var valueWidth = this.dynamicWidth.split('px')
                        if(valueWidth[0] < 285){
                            this.imageHeight='auto !important' 
                            this.imageWidth='380px !important' 
                        }else if(valueWidth[0] > 285) {
                            this.imageHeight='auto !important' 
                            this.imageWidth='380px !important' 
                        }    
                    }else if(this.selectedCanvasHeight < this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth='380px !important'
                    }
                }
                else{
                    this.imageHeight='380px !important' 
                    this.imageWidth='auto !important' 
                    console.log('111111asas')
                }
            }
        }
    }
}
</script>
