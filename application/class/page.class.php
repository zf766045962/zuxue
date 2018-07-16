<?php
class RewritePage
{
    private $myde_count; //总记录数
    public $myde_size; //每页记录数
    private $myde_page; //当前页
    private $myde_page_count; //总页数
    private $page_url; //页面url
    private $page_i; //起始页
    private $page_ub; //结束页
    public $page_limit;

    function __construct($myde_count=0,$myde_size=1,$myde_page=1,$page_url)//构造函数
    {
        $this->myde_count=$this->numeric($myde_count);
        $this->myde_size=$this->numeric($myde_size);
        $this->myde_page=$this->numeric($myde_page);
        $this->page_limit=($this->myde_page * $this -> myde_size) - $this -> myde_size; //下一页的开始记录
        $this->page_url=$page_url; //连接的地址
        if($this->myde_page<1)$this->myde_page=1; //当前页小于1的时候，，值赋值为1
        if($this->myde_count<0)$this->myde_page=0;
       
        if($this->myde_count%$this->myde_size!=0){
			 $this->myde_page_count=ceil($this->myde_count/$this->myde_size);//总页数
		}else{
			 $this->myde_page_count=$this->myde_count/$this->myde_size;//总页数
		}
	    if($this->myde_page_count<1)
        $this->myde_page_count=1;
        if($this->myde_page>$this->myde_page_count)
        $this->myde_page=$this->myde_page_count;
        //$this->page_i=$this->myde_page-2;
        $this->page_i=$this->myde_page-2;
        $this->page_ub=$this->myde_page+2;
        //$this->page_ub=$this->myde_page+2;
        if($this->page_i<1)$this->page_i=1;
        if($this->page_ub>$this->myde_page_count){$this->page_ub=$this->myde_page_count; }
    }
    
    private function numeric($id) //判断是否为数字
    {
        if (strlen($id)){
            if (!preg_match("/^[0-9]+$/",$id)) $id = 1;
        }else{
            $id = 1;
        }
        return $id;
    }
    
    private function page_replace($page) //地址替换
    {
        return str_replace("{page}", $page, $this -> page_url);
    }
    
    private function myde_home() //首页
    {
        if($this -> myde_page != 1){
            return " <span><a href=\"".$this -> page_replace(1)."\" title=\"首页\" >首页</a></span>\n";
        }else{
            return " <span>&nbsp;首页&nbsp;</span>\n";
        }
    }
    
    private function myde_prev() //上一页
    {
        if($this -> myde_page != 1){
            return " <span><a href=\"".$this -> page_replace($this->myde_page-1) ."\" title=\"上一页\" >上一页</a></span>\n";
        }else{
            return " <span>&nbsp;上一页&nbsp;</span>\n";
        }
    }
    
    private function myde_next() //下一页
    {
        if($this -> myde_page != $this -> myde_page_count){
            return " <span><a href=\"".$this -> page_replace($this->myde_page+1) ."\" title=\"下一页\" >下一页</a></span>\n";

        }else{
            return " <span>&nbsp;下一页&nbsp;</span>\n";
        }
    }
    
    private function myde_last() //尾页
    {
        if($this -> myde_page != $this -> myde_page_count){
            return " <span><a href=\"".$this -> page_replace($this -> myde_page_count)."\" title=\"尾页\" >尾页</a></span>\n";

        }else{
            return " <span>&nbsp;尾页&nbsp;</span>\n";
        }
    }
    
	//height: 25px; line-height: 30px;
    function myde_write($id='page') //输出
    {
        $str = "<div id=\"".$id."\" style=\" \">\n  ";
        $str .= " 共计".$this -> myde_count."记录\n";
	    $str .= $this -> myde_home();
        $str .= $this -> myde_prev();
        for($page_for_i=$this->page_i;$page_for_i <= $this -> page_ub; $page_for_i++){
            if($this -> myde_page == $page_for_i){
                $str .= " <span style='color:red'>".$page_for_i."</span>\n";
            }
            else{
                $str .= " <span><label><a href=\"".$this -> page_replace($page_for_i)."\" title=\"第".$page_for_i."页\">";
                $str .= $page_for_i . "</a></label></span>\n";
            }
        }
        $str .= $this -> myde_next();
        $str .= $this -> myde_last();
		$str .= "&nbsp;&nbsp;&nbsp;页次：".$this -> myde_page.'/'.$this -> myde_page_count."页&nbsp;&nbsp;".$this ->myde_size."条/页\n";
		$str .= "<select onchange='window.location=this.value'>";
		for($i=1;$i<=$this ->myde_page_count;$i++)
		{
			if($this ->myde_page==$i)
			{
				$flag = ' selected="selected"';
			}
			else
			{
				$flag = "";
			}
			$str .='<option value="'.$this -> page_replace($i).'" '.$flag.'>第'.$i.'页</option>';
		}
		$str .='</select>';
/*				
        $str .= " <input size=\"4\" type=\"text\" value=\"".$this -> myde_page."\"";
        $str .= "onmouseover=\"javascript:this.value='';this.focus();\" onkeydown=\"javascript: if(event.keyCode==13){ location='";
        $str .= $this -> page_replace("'+this.value+'")."';return false;}\"";
        $str .= " title=\"输入您想要到达的页码,然后回车！\" />\n";
	*/
        $str .= " </div>";
        return $str;
    }
}
/*-------------------------实例--------------------------------*
$page = new RewritePage(1000,5,$_GET['page'],'?page={page}');//用于动态
$page = new RewritePage(1000,5,$_GET['page'],'list-{page}.html');//用于静态或者伪静态
$page -> myde_write();//显示
*/
?>