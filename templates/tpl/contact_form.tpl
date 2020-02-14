
		<div class="container mt-5">
			<h1 class="text-center">聯絡我們</h1>
			
        <!-- 表單返回頁，記得在表單加「 target='returnWin' 」 -->
        <iframe name="returnWin" style="display: none;" onload="this.onload=function(){window.location='index.php?op=ok'}"></iframe>

        <form  target='returnWin' role="form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSdEdFVM05z1TaxO2rdqukwPVKC3RqG3G70cdgznjX3xbCHOTg/formResponse" method="post" id="myForm" >
            
            <div class="row">
                <!--姓名-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">姓名</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.1597864916" id="name" value="">
                    </div>
                </div>
                <!--電話-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">電話</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.2110810376" id="tel" value="">
                    </div>
                </div>
                <!--email-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">email</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.1402899655" id="email" value="">
                    </div>
                </div>
            </div> 
            
            <div class="row">
                <div class="col-sm-12">  
                    <!-- 聯絡事項 -->
                    <div class="form-group">
                        <label class="control-label">聯絡事項</label>
                        <textarea class="form-control" rows="5" id="contact" name="entry.1136713386"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center pb-3">
                <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
		</div>