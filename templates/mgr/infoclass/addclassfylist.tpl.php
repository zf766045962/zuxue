
<div class="main-cont" style="line-height:3"><h3>
  <?php 
		function showDepth($n){
			if($n==0){
			echo '+';
			}else{
				for($i=1;$i<=$n;$i++)
				{
					echo '--';
				}
			}
		}
		function showchild($pid,$currentid){
		
            $child=	DR('mgr/infoclass.getClassInfo','',$pid);
			if($child){
            foreach($child as $c){
            ?>      
      <option value="<?php echo $c['classid'];?>"  <?php if($currentid==$c['classid']){echo 'selected';} ?>> <?php showDepth($c['depth']);?> <?php echo $c['classname'];?>  </option>

        <?php
            
			$next=$c['child'];
			
			if($next){
				 showchild($c['classid'],$currentid);
			 }
		   }//end child each
		 }//endif
		}
  
  
		$title=isset($list['title'])?$list['title']:''	;
		$contentid=isset($list['contentid'])?$list['contentid']:''	;
		$classid=isset($list['classid'])?$list['classid']:''	;
		?>
  </h3>
  <div class="set-area">
      <form action="<?php echo URL('mgr/infoclass.contentSave')?>" name="form1" method="post" id="form1">
        <div class="form-row">
          <label class="form-field">所属栏目</label>
          <div class="form-cont">
            <select name="classid" id="classid" style="background-color:#EEEEEE">
           <?php  showchild($pid,$classid); ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <label class="form-field">信息名称</label>
          <div class="form-cont">
            <input name="title" class="input-txt"  vrel="english|ne=m:不能为空|sz=min:2,max:20,m:长度在2-20个字符之间,ww" type="text" size="20" value="<?php echo $title?>"  warntip="#nameTip2" ><span id="nameTip2" class="tips-error hidden"></span>
            <input name="contentid" class="input-txt"  type="hidden" size="50" value="<?php echo $contentid?>">
          </div>
        </div>
        <div class="btn-area"> <a href="javascript:;"  class="btn-general highlight" id="pop_ok"><span>保存</span></a>&nbsp;&nbsp; <a href="javascript:;"  class="btn-general highlight" id="pop_cancel"><span>取消</span></a> </div>
      </form>
    </div>
</div>
