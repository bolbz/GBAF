<?php
    header("Content-type: text/css; charset: UTF-8");
    header('Cache-control: must-revalidate');
?>


.firma-card{
    background: #fff;
    border: 1px solid;
    border-color: #c7bdbd40;
    margin: 1rem auto;
    border-radius: 5px;
    box-shadow: 0 4px 6px -1px rgb(198, 207, 234);
    margin-bottom: 1.6%;
    overflow: hidden;
    border: 2px solid red;
  }
  .firma-resim{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: center;
    transition: -webkit-transform .2s;
    transition: transform .2s;
    background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg);
    margin: 10px;
    border: 1px solid red;
  }
  .firmalar{
    background: #f1f4f5c7;
    border: 2px solid red;
  }
  
  @media (max-width: 768px) {
  
    .firma-logo{
          width: calc(33.66667% - .75rem);
          height: 6.5rem;
          margin: 5px .375rem;
    }
    .firma-resim {
      position: relative;
      z-index: 0;
      height: 200px;
    }
    .img-padding-no{
      padding-right: 0px;
      padding-left: 0px;
    }
  }
  
