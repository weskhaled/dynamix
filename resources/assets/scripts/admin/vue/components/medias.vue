<template>
<div class="container-fluid">     
    <el-row :gutter="15" class="mt-3 mb-3">
      <el-col :span="24">
          <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
              <el-breadcrumb-item>Medias</el-breadcrumb-item>
          </el-breadcrumb>
      </el-col>
    </el-row>  
    <el-row :gutter="15" class="mb-3">
      <el-col :span="24">
        <el-pagination
          @size-change="handleSizeChange"
          @current-change="handleCurrentChange"
          :current-page.sync="currentPageMedias"
          :page-sizes="[10, 50, 100, 'All']"
          :page-size="per_page"
          layout="total, sizes, prev, pager, next, jumper"
          :total="totalmedias">
        </el-pagination>
      </el-col>
    </el-row>
    <el-row :gutter="0" class="media-imgs grid" ref="grid" v-masonry transition-duration="0.3s" item-selector=".grid-item">
      <el-col :span="8" :sm="24" :md="12" :lg="6" class="grid-item text-center" v-masonry-tile>
        <el-card :class="closedcard ? 'closed' : ''" class="d-block p-0 mr-1 mb-1" data-width="1" data-height="1" shadow="hover" style="">
          <div slot="header" class="clearfix d-flex bd-highlight px-2 py-1">
              <div class="mr-auto bd-highlight">
                  <h4>Add new</h4>
              </div>
              <div class="action bd-highlight">
                  <el-button class="py-1" type="text">
                    <more-horizontal-icon class=""></more-horizontal-icon>
                  </el-button>
              </div>
          </div>
          <el-upload
            class="upload-demo"
            drag
            :action="wpApiSettings.root+'dynamix/v1/addmedia'"
            :headers="{ 'X-WP-Nonce': wpApiSettings.nonce }"
            :on-success="handleSuccess"
            :on-preview="handlePreview"
            :on-remove="handleRemove"
            :file-list="fileList"
            multiple>
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
            <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
          </el-upload>
        </el-card>
      </el-col>
      <el-col :span="8" :sm="24" :md="12" :lg="6" class="grid-item text-center" v-masonry-tile v-for="(media, index) in allmedias" :key="index">
        <el-card :class="!(closedmediacard.indexOf(media.id) === -1) ? 'closed' : ''" class="d-block p-0 mr-1 mb-1" data-width="1" data-height="1" shadow="hover" style="">
          <div slot="header" class="clearfix d-flex bd-highlight px-2 py-1">
              <div class="mr-auto bd-highlight">
                  <h4>{{media.name}}</h4>
              </div>
              <div class="action bd-highlight">
                <el-tooltip content="Actions" placement="top">
                  <el-dropdown class="py-1" trigger="click">
                      <el-button type="text" class="py-0">
                        <more-horizontal-icon class=""></more-horizontal-icon>
                      </el-button>
                      <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item>Action 1</el-dropdown-item>
                        <el-dropdown-item>Action 2</el-dropdown-item>
                        <el-dropdown-item>Action 3</el-dropdown-item>
                      </el-dropdown-menu>
                    </el-dropdown>
                  </el-tooltip>
                  <el-tooltip :content="!(closedmediacard.indexOf(media.id) === -1) ? 'Open Card' : 'Close Card'" placement="top">
                    <el-button class="py-1" type="text" @click="ToggleCard(media.id)">
                      <chevron-up-icon v-if="!media.closedcard"></chevron-up-icon>
                      <chevron-down-icon class="" v-if="media.closedcard"></chevron-down-icon>
                    </el-button>
                  </el-tooltip>
              </div>
          </div>
          <div class="clearfix">
            <figure class="effect-zoe">
              <img :src="media.url" class="img-fluid img-fancy" :alt="media.name" @click="viewimg = index;visible = true;" >
              <figcaption>
                <div class="row m-0">
                  <div class="col-sm-7 p-0">
                    <h2>{{media.name}}</h2>
                  </div>
                  <div class="col-sm-5 p-0">
                    <div class="icon-links pull-right text-center">
                      <el-button class="ml-1" size="mini" type="primary" circle>
                        <i class="fa fa-eye"></i>
                      </el-button>
                      <el-button class="ml-1" @click="imgtoedit = media.url;visibleeditor = true;" size="mini" type="info" circle>
                        <i class="fa fa-edit"></i>
                      </el-button>
                      <el-button class="ml-1" @click="ConfirmDelete(media)" size="mini" type="danger" circle>
                        <i class="pg-trash"></i>
                      </el-button>
                    </div>
                  </div>
                </div>
              </figcaption>			
            </figure>
          </div>
        </el-card>
      </el-col>
    </el-row>
    <!-- dialog -->
    <el-dialog width="80%" top="40px" :visible.sync="visible" :title="allmedias[viewimg] ? allmedias[viewimg].name : 'Image Preview'">
        <el-row style="margin: -30px -20px">
            <div class="swiper-container bg-light">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper" style="height: 550px">
                <!-- It is important to set "left" style prop on every slide -->

                <div class="swiper-slide"
                  v-for="(slide, index) in allmedias"
                  :key="index"
                  :data-hash="'/medias/slider_'+slide.id"
                >
                    <div class="swiper-zoom-container bg-light">
                        <img :src="slide.url" class="img-fluid">
                    </div>
                </div>
                
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>

              <!-- If we need navigation buttons -->
                <nav class="">
                    <a class="prev text-right" href="javascript:void(0)">
                        <span class="icon-wrap"><i class="icon fa fa-angle-left"></i></span>
                    </a>
                    <a class="next text-left" href="javascript:void(0)">
                        <span class="icon-wrap"><i class="icon fa fa-angle-right"></i></span>
                    </a>
                </nav>
            </div>
        </el-row>
    </el-dialog>
    <!-- dialog -->
    <el-dialog width="98%" top="5px" :visible.sync="visibleeditor" title="Image Preview">
        <el-row style="margin: -30px -20px">
          <div class="image-editor-wrap" style="height: calc(100vh - 85px)">
            <div id="image-editor" class="image-editor-container right" style="height: 100%;max-height: 100%;overflow: auto;">
              <div class="image-editor-controls row">
                  <div class="col ml-auto">
                      <el-dropdown size="small" split-button type="danger" @click="imgCorp()">
                        Actions
                        <el-dropdown-menu slot="dropdown">
                         <el-dropdown-item>Action 1</el-dropdown-item>
                         <el-dropdown-item>Action 2</el-dropdown-item>
                         <el-dropdown-item>Action 3</el-dropdown-item>
                         <el-dropdown-item>Action 4</el-dropdown-item>
                        </el-dropdown-menu>
                      </el-dropdown>
                    </div>
              </div>
              <div class="image-editor-main-container" style="height: 100%">
                  <div class="tui-image-editor" ref="tuieditor" style="height: 100%">
                </div>
              </div>
            </div>
            <!-- <div id="tui-image-editor" ref="tuieditor" style="height: calc(100vh - 85px)"></div> -->
          </div>
        </el-row>
    </el-dialog>
</div>  
</template>
<script>
// var ImageEditor = require('tui-image-editor');
import * as MyImageEditor from '../libs/image-editor/imgeditor';
import axios from 'axios';
import Swiper from 'swiper';
import { MoreHorizontalIcon,ChevronUpIcon,ChevronDownIcon } from 'vue-feather-icons';
// import $ from 'jquery';
export default {
  name: "Section",
  components: {
    MoreHorizontalIcon,
    ChevronUpIcon,
    ChevronDownIcon,
  },
  data: () => ({
      // reactive data property of the component.
        wpApiSettings: wpApiSettings,
        allmedias : [],
        totalmedias: 0,
        per_page : 10,
        currentPageMedias : 1,
        visible : false,
        closedcard :false,
        closedmediacard : [],
        viewimg: null,
        confirmdelete :false,
        fileList:[],
        swiper_medias: null,
        myedit:null,
        visibleeditor: false,
        imgtoedit:null,
  }),
  watch : {
    visible : function (val) {
      let self = this;
      if(val){
        this.$nextTick(function () {
          this.swiper_medias = new Swiper('.swiper-container', {
            init : false,
            navigation: {
              nextEl: '.next',
              prevEl: '.prev',
            },
            // hashNavigation: {
            //   replaceState: true,
            // },
            // autoHeight : true,
            grabCursor : true,
            pagination: {
              el: '.swiper-pagination',
              type: 'bullets',
              clickable : true,
            },
            spaceBetween: 0,
            slidesPerView :1,
            zoom: {
              maxRatio: 5,
            },
            on : {
              transitionEnd : function(){
                 self.viewimg = this.activeIndex;
              },
            },
          });
          self.swiper_medias.init();
          self.swiper_medias.slideTo(self.viewimg);
        })
      } else {
        if(self.swiper_medias instanceof Swiper){
          self.swiper_medias.destroy(true, false);
        }
      }
      // console.log('new: %s, old: %s', val, oldVal);
    },
    visibleeditor : function(val){
      let self = this;
      if(val){
        this.$nextTick(function () {
          this.myedit = MyImageEditor.init({el: self.$refs.tuieditor,imgurl: 'https://cdn-images-1.medium.com/max/2000/1*7ZdX-pXxmBZuFtEZqeiWGA.jpeg'});
          console.log(self.myedit);
        });
      } else {
          MyImageEditor.destroy();
      }
    },
  },    
  methods: {
    getallmedias(data={}){
      return axios.post(wpApiSettings.root+'dynamix/v1/allmedias',data,{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
    },
    deletepost(id){
      return axios.delete(wpApiSettings.root+'wp/v2/media/'+id+'?force=true',{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
    },
    ToggleCard(id){
      let self = this ; 
      this.allmedias.map(media => {
        if(media.id == id){
          media.closedcard = !media.closedcard;
          if(self.closedmediacard.indexOf(id) === -1){
            self.closedmediacard.push(media.id);
          } else {
            self.closedmediacard.splice(self.closedmediacard.indexOf(media.id), 1)
          }
        }
      });
      self.reDraw();
    },
    handleRemove(file, fileList) {
      console.log(file, fileList);
    },
    handlePreview(file) {
      console.log(file);
    },
    handleSuccess(response) {
      let self = this;
      self.allmedias = response;
      this.allmedias.map(x => {
        x.closedcard = false;
      });
      this.reDraw();
    },
    handlePictureCardPreview(file) {
      console.log(file);
    },
    handleSizeChange(val) {
      // console.log(val);
      this.per_page = val;
      if(isNaN(val)){ this.per_page = this.totalmedias }
      this.getallmedias({'offset': 0,'per_page': this.per_page}).then((response) => {
          this.allmedias = response.data.data;
          this.totalmedias = response.data.lenght;
          this.currentPageMedias = response.data.page;
          this.allmedias.map(x => {
            x.closedcard = false;
          });
          this.reDraw();
      })
    },
    handleCurrentChange(val) {
      console.log(`current page: ${val}`);
      this.getallmedias({'offset': (val-1)*this.per_page,'per_page': this.per_page}).then((response) => {
          this.allmedias = response.data.data;
          this.totalmedias = response.data.lenght;
          this.currentPageMedias = response.data.page;
          this.allmedias.map(x => {
            x.closedcard = false;
          });
          this.reDraw();
      })
    },
    reDraw(){
      let self = this;
      setTimeout(function () { 
        self.$nextTick(function () {
          self.$redrawVueMasonry();
        })
      } , 201);
    },
    ConfirmDelete(media) {
      console.log(media);
      this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning',
      }).then(() => {
        this.deletepost(media.id).then((response) => {
          console.log(response);
          // this.allmedias = response.data;
          this.getallmedias().then((response) => {
            this.allmedias = response.data.data;
            this.reDraw();
          })
          this.$message({
          showClose: true,
          type: 'success',
          message: 'Delete completed',
        });
        })
      }).catch(() => {
        this.$message({
          showClose: true,
          type: 'info',
          message: 'Delete canceled',
        });          
      });
    },
    renderlayout(){
      console.log('test');
      this.$redrawVueMasonry();
    },
    imgCorp(){
      this.myedit.startDrawingMode('CROPPER');
    },
  },
  computed: {
  },
  mounted: function() {
    this.$root.$on('redrawVueMasonry', () => {
        this.reDraw();
    })
    this.getallmedias().then((response) => {
        this.allmedias = response.data.data;
        this.totalmedias = response.data.lenght;
        this.currentPageMedias = response.data.page;
        this.allmedias.map(x => {
          x.closedcard = false;
          // console.log(x);
        });
        this.reDraw();
    })
  },
  // updated: function () {
  //   this.$nextTick(function () {
  //     // Code that will run only after the
  //     this.reDraw();
  //   })
  // },
}
</script>