import $ from 'jquery';

console.log('westest');
wp.customize('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});
