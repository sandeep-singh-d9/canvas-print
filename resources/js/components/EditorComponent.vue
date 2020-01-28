<template>
    <div class="builder container">
        <div class="row m-0">
            <div class="col-lg-6 p-5 mirrored">
                <div class="mainimage__preview" :style="{opacity: '1', width: selectedHeight+'px'}">
                    <div class="image__preview_section" :style="{paddingLeft: '20px', width: topWrapWidth+40+'px'}">
                        <div class="image__preview_top" :style="{height: '20px', width:dynamicWidth,}">
                            <div class="innerimage_window" :style="{width: '100%', height: 'auto',  paddingTop:dynamicHeight}">
                                <div class="innerimage_canvas" style="top:0; left: -30%;">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath" >
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_right" :style="{height: dynamicHeight, width: '20px'}">
                            <div class="innerimage_window" :style="{height: '380px', width: '380px', paddingTop:dynamicHeight}">
                                <div class="innerimage_canvas" style="top:0; right: -112.594px; left: auto;">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath" style=" margin-left: 0px;">
                                </div>
                            </div>
                        </div>

                        <div class="image__preview"  :style="{width:dynamicWidth,height:dynamicHeight}">
                            <div class="innerimage_window wrapper" :style="{width: '100%', height: 'auto' ,paddingTop:dynamicHeight, cursor:'all-scroll'}" >
                                <div  class="innerimage_canvas map" style="top:0; left: -30%;">
                                    <img class="image__preview_main transform-after-drag" style="touch-action: none;cursor: grab;transform: translate3d(0px, 0px, 0px);user-select: none;z-index: 1001;" :src="imagePath" >
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_bottom" :style="{height: '20px', width: dynamicWidth}">
                            <div class="image__preview_bottom-inner">
                                <div class="innerimage_window" :style="{width:'100%', height:'auto',  paddingTop:bottomImageHeight-5+'px'}">
                                    <div class="innerimage_canvas" style="top:0; left: -30%;">
                                        <img class="image__preview_image transform-after-drag" :src="imagePath" style=" margin-top: 0px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="image__preview_left" :style="{height: dynamicHeight, width: '20px', top: '20px'}">
                            <div class="innerimage_window" :style="{width:dynamicWidth,height:dynamicHeight, paddingTop:'100%'}">
                                <div class="innerimage_canvas" style="top:0; left: -30%;">
                                    <img class="image__preview_image transform-after-drag" :src="imagePath"  >
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
            <div class="col-lg-6 p-5">
                <div>
                    <button @click="imageUpload">UploadImage</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select v-model="selectedCanvasWidth" @change="getContext" class="form-control">
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                            <option value="20">20</option>
                            <option value="24">24</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select v-model="selectedCanvasHeight" @change="getContext" class="form-control">
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="18">18</option>
                            <option value="24">24</option>
                            <option value="30">30</option>
                            <option value="36">36</option>
                            <option value="36">36</option>
                            <option value="40">40</option>
                        </select>
                    </div>
                </div>
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
const client = filestack.init('AzESQpbNMRkulCa1DzhIPz');
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
            imagePath:''

        }
    },
    mounted(){
        this.layoutModify()
            Draggable.create(".map img", {
                type:"x,y",
                    bounds:".wrapper",
                    edgeResistance:1,
                    onDrag:yourFunction
            });
            function yourFunction(e){
                console.log(e.target.style.cssText, 'sasas')
                $(document).ready(function(){
                    $('.transform-after-drag').attr('style',e.target.style.cssText)
                })
            }
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
        imageUpload(){
            const options = {
                onUploadDone:updateForm,
            };
            const picker = client.picker(options);
            picker.open();
            const self = this 
            function updateForm(result){
                console.log(result, 'asasassa')
                const fileData = result.filesUploaded[0];
                self.imagePath = fileData.url;
            }
        },
        getContext(){
            console.log(this.selectedHeight , this.selectedWidth)
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
            this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                this.dynamicWidth = '380px'
                this.dynamicHeight = '380px'
                this.topWrapWidth = 380
                /*For bottom image */
                this.bottomImageHeight = 380
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                this.dynamicWidth = '380px'
                this.dynamicHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                this.topWrapWidth = 380 
                /*For bottom image */
                this.bottomImageHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                console.log(this.dynamicHeight, 'asas')
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                this.dynamicHeight = '380px'
                this.dynamicWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                this.topWrapWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                this.bottomImageHeight = 380
                console.log(this.dynamicWidth, 'asas')
            }
        }
    }
}
</script>
