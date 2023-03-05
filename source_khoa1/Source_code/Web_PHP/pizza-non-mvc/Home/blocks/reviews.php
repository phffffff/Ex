<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet"> 
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .reviews {
    display: flex; 
    width: 100%;
    height: 500px;
    align-items: center; 
    background-image: url('http://pizzahouse.themerex.net/wp-content/uploads/2016/08/bg_testimonials.jpg?id=1319') !important;
  }
  .reviews-wrapper {
    width: 100%;
    height: 300px;
    display: flex; 
    flex-direction: column; 
    /* background-color: powderblue; */
  }
  .reviews-titles {
    display: flex;
    flex-direction: column;  
    flex: 1 0 0px;
    justify-content: space-around;
    align-items: center;
  }
  .reviews-title-above {
    color: yellow; 
    font-size: 20px; 
    font-family: 'Dancing Script', cursive;
    /* font-family: 'Dosis', sans-serif; */
  }
  .reviews-title-under {
    color: white; 
    font-size: 40px;
    font-family: 'Graviola Soft W01';
  }
  .reviews-list {
    display: flex;
    flex: 4 0 0px;
    justify-content: center;
    align-items: center;
    /* background-color: green; */
  }
  .reviews-list-container {
    display: flex;
    width: 70rem;
    height: 85%;
    justify-content: space-between;
    align-items: center;
    /* background-color: yellow; */
  }
  .reviews-list-wrapper {
    display: flex;
    align-items: center;
    width: 80%;
    height: 100%;
    /* background-color: red; */
    overflow: hidden;
  }
  .review-content {
    width: 100rem;
    height: 100%;
    /* background-color: orange; */
    text-align: center;
    margin-left: 180px;
  }
  .review-content-detail {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    height: 140px;
    /* background-color: powderblue; */
  }
  .review-txt {
    font-family: inherit;
    font-style: italic;
    font-size: 19px;
    font-weight: 600;
    color: white;
  }
  .review-txt::after {
    content: '"';
  }
  .review-txt::before {
    content: '"';
  }
  .review-username {
    font-size: 17px;
    color: orange;
  }
</style>
<section class="reviews">
  <div class="reviews-wrapper">
    <div class="reviews-titles">
      <p class="reviews-title-above">Một vài cảm nhận tích cực</p>
      <p class="reviews-title-under">Cảm nhận một vài khách hàng</p>
    </div>
    <div class="reviews-list">
      <div class="reviews-list-container">
        <button id="prev-btn">prev</button>
        <div class="reviews-list-wrapper">
          <div id="list" style="display: flex; width: 2220px; height: 90%; background-color: transparent; margin-left: 0px; transition: 0.5s;">
            <div class="review-content">
              <div class="review-content-detail">
                <p class="review-txt">...fresh contemporary feel, offering a good selection of freshly prepared and cooked pizza's together with a good selection of drinks and desserts. Service was attentive and relaxed. The food was tasty and of good quality.</p>
                <p class="review-username">Doug Barton</p>
              </div>
            </div>
            <div class="review-content">
              <div class="review-content-detail">
                <p class="review-txt">...fresh contemporary feel, offering a good selection of freshly prepared and cooked pizza's together with a good selection of drinks and desserts. Service was attentive and relaxed. The food was tasty and of good quality.</p>
                <p class="review-username">Doug Barton</p>
              </div>
            </div>
            <div class="review-content">
              <div class="review-content-detail">
                <p class="review-txt">...fresh contemporary feel, offering a good selection of freshly prepared and cooked pizza's together with a good selection of drinks and desserts. Service was attentive and relaxed. The food was tasty and of good quality.</p>
                <p class="review-username">Doug Barton</p>
              </div>
            </div>
          </div>
        </div>
        <button id="next-btn">next</button>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  let click_times = 0; 
  document.getElementById('next-btn').onclick = () => {
    if (click_times == 2) {
      click_times = 0
      document.getElementById('list').style.marginLeft = "0px";
    }
    else {
      click_times++;
      console.log(click_times)
      document.getElementById('list').style.marginLeft = 
        (click_times == 1 ? "-750px" : "-1500px");
    }
  }
</script>