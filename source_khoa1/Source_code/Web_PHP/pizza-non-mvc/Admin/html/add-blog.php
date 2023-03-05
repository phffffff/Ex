<?php require_once 'header.php' ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="row">
      <div class="col-md-12">
        <form class="card" action="../handles/add_blog.php" method="POST">
          <div class="card-header">
            <strong>Tạo bài viết mới</strong>
          </div>
          <div class="card-body card-block">
            <div class="row">
              <div class="row col-md-5 form-group ml-1">
                <div class="col-12 col-md-9">
                  <input type="text" id="text-input" name="blog_title" placeholder="Tiêu đề" class="form-control">
                </div>
              </div>
              <div class="row col-md-6 form-group">
                <div class="col-12 col-md-12">
                  <input type="text" id="text-input" name="blog_image" placeholder="Ảnh đại diện" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12">
              <textarea name="blog_content" id="textarea-input" rows="17" placeholder="Content..." class="form-control"></textarea>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm float-right">
              Tạo bài viết
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>