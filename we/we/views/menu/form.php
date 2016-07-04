<!-- /SIDEBAR -->
        <!-- SAMPLE BOX CONFIGURATION MODAL FORM   欢迎使用-->
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">

                 
        <form action="index.php?r=menu/adds" method="post">

            <h3>自定义菜单</h3><br>
                <ul>
                   <li><h5>菜单名称</h5>
                        <input type="text" name="m_name"/></li>
                    <li style="margin-top: 10px">
                    <h5>菜单等级 </h5>
                    <select name="m_pid" id="">
                        <option value="0">父级菜单</option>
                        <option value="1">子菜单</option>
                    </select>
                        
                    <i class="fa fa-info"></i>
                </ul>
                
                    <input type="reset" class="btn btn-primary" id="normal" value="Reset">　　
                    <input type="submit" class="btn btn-primary" id="normal" value="Submit">

                </div>

        </form>
             
                </div>
                <div class="footer-tools">
             <span class="go-top">
    <i class="fa fa-chevron-up"></i> Top
</span>
                </div>
            </div><!-- /CONTENT-->
        </div>

<script src="./common/js/script.js"></script>
        <script>
            jQuery(document).ready(function() {
                App.setPage("tabs_accordions");  //Set current page
                App.init(); //Initialise plugins and elements
            });
        </script>