<template>
  <div id="app">
  <el-container>
           <el-header style="height: auto;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">DYNAMIX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="ml-auto">
                <el-menu :router="true" text-color="#fff" 
                         background-color="#8b46ff" active-text-color="#eee"
                         class="el-menu-demo" mode="horizontal">
                  <el-menu-item  index="/About">
                    About
                  </el-menu-item>
                  <el-menu-item  index="/">
                    Hello
                  </el-menu-item>
                  <el-submenu index="">
                    <template slot="title">Workspace</template>
                    <el-menu-item index="/">Hello</el-menu-item>
                    <el-menu-item index="/About">About</el-menu-item>
                  </el-submenu>
                </el-menu>
              </div> 
            </div>
            </nav>
        </el-header>
    <el-container>
        <el-aside width="auto">
            <!-- <el-radio-group size="small" v-model="isCollapse" style="margin-bottom: 20px;">
              <el-radio-button :label="false">expand</el-radio-button>
              <el-radio-button :label="true">collapse</el-radio-button>
            </el-radio-group> -->
            <el-menu size="small" default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
              <el-menu-item index="4" @click="isCollapse = !isCollapse">
                <i :class="isCollapse ? 'pg-menu' : 'pg-close'"></i>
                <span slot="title">Collapse Navigation</span>
              </el-menu-item>
              <el-submenu size="small" index="1">
                <template slot="title">
                  <i class="el-icon-location"></i>
                  <span slot="title">Navigator One</span>
                </template>
                <el-menu-item-group>
                  <span slot="title">Group One</span>
                  <el-menu-item index="1-1">item one</el-menu-item>
                  <el-menu-item index="1-2">item two</el-menu-item>
                </el-menu-item-group>
                <el-menu-item-group title="Group Two">
                  <el-menu-item index="1-3">item three</el-menu-item>
                </el-menu-item-group>
                <el-submenu index="1-4">
                  <span slot="title">item four</span>
                  <el-menu-item index="1-4-1">item one</el-menu-item>
                </el-submenu>
              </el-submenu>
              <el-menu-item index="2">
                <i class="el-icon-menu"></i>
                <span slot="title">Navigator Two</span>
              </el-menu-item>
              <el-menu-item index="3" disabled>
                <i class="el-icon-document"></i>
                <span slot="title">Navigator Three</span>
              </el-menu-item>
            </el-menu>
      </el-aside>
      <el-main>
        <router-view></router-view>
      </el-main>
    </el-container>
  </el-container>
  </div>
</template>
<script>
    export default {
      name: "app",
      data: () => ({
         isCollapse: true,
      }),
      methods: {
        handleSelect(key, keyPath) {
          console.log(key, keyPath);
        },
        handleOpen(key, keyPath) {
          console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
          console.log(key, keyPath);
        },
      },
    }
</script>