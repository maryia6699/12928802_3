<?php
if( !defined('CORE') ) exit('Request Error!');

class ctl_xingpan extends common{
    // 自动验证设置
    protected $_submit_validate     =   array(
        'title'=>array('','notempty','标题必须！','all'),
        //'content'=>array('','notempty','内容必须！','all'),
        'tid'=>array('','notempty','','all'),
        'id'=>array('id','notempty','主键必须！','update'),
    );

    protected $_db_validate     =   array(
       // 'title'=>array('title','unique','已经存在！','all','extend'=>array('cp','type')),
    );
    // 自动填充设置
    protected $_auto     =   array(
        //'status'=>array('status','value','1','all'),
        //入表时间和更新时间放到构造函数中执行，因为此处不支持动态赋值
    );


    protected $_allowAction = array();//允许操作的方法列表
	
	
    protected $categorys = array( 1=>'落入星座', 2=>'落入宫', 3=>'落入纬度');
	

    public function __construct()
    {
        //$this->_auto['uid'] = array('uid', 'value', cls_access::$accctl->uid, 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['uptime'] = array('uptime', 'value', date("Y-m-d H:i:s"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['addtime'] = array('addtime', 'value', date("Y-m-d H:i:s"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['intdate'] = array('intdate', 'value', date("ymd"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['updatetime'] = array('updatetime', 'value', date("Y-m-d H:i:s"), 'update');//属性赋予默认值无法动态计算；放到此处执行
        // category 0 default 1 gif 2 吐槽 3 视频 4笑话 5图片
        //type 0 未知  1 图片 2 视频 3 文字
        //$this->cps = array('duowan'=>'多玩','juyouqu'=>'juyouqu','laifudao'=>'来福岛','3jy'=>'3jy','baozoumanhua'=>'暴走漫画','mahua'=>'mahua','youku'=>'youku',);
//        $this->cps = array('duowan'=>'多玩','juyouqu'=>'juyouqu','laifudao'=>'来福岛','3jy'=>'3jy','baozoumanhua'=>'暴走漫画','mahua'=>'mahua','youku'=>'youku','haha'=>'haha','negui'=>'乐归网','jokeji'=>'jokeji','wasu'=>'华数','zol'=>'zol', 'duzhebao'=>'读者宝');
//        $this->categorys = array('0'=>'default','1'=>'gif','2'=>'吐槽','3'=>'视频','4'=>'笑话','5'=>'图片',);
//        $this->types = array('0'=>'default','1'=>'图片','2'=>'视频','3'=>'文字',);
//id, title, content, content_length, description, category, type, displayOrder, isTop, sourceid,sourceUrl, uid, upCount, downCount,
//commentCount, favoriteCount, STATUS, intdate, updatetime, addtime
        $this->_dbfield=array(
            'mainKey'=>'id',
            'allTableField'=>array('id'=>'编号','title'=>'标题','tid'=>'栏目','content'=>'内容','shorttxt'=>'简介','t1'=>'参数1','t2'=>'参数2','t3'=>'参数3'),
            'addTableField'=>array('title','tid','content','shorttxt'),
			
            'editTableField'=>array('title','tid','shorttxt','content','t1','t2','t3'),
           
            'listTableField'=>array('id','title','tid','t1','t2','t3'),
			
            'batchUpdateTableField'=>array('title','tid'),
            'batchDeleteTableField'=>array(
                'mainKey'=>'id',
            ),
             'id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'title'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
			'content'=>array(
				'element'=>array('e_name'=>'input','e_type'=>'text', 'richtext'=>true),
                
            ),
			'tid'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->categorys),
                'search'=>'1',
            ),
			'shorttxt'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:200px;height:60px;'),
                'search'=>'1',
            ),
			't1'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
			't2'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            't3'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            

        );


        parent::__construct();

        $this->table = 'xingpan_data';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            /*'_extend'=>array(
                '?ct=commend_data&ac=add'=>array('title'=>'添加到推荐位','type'=>'dialog','width'=>'700','height'=>'700','param'=>'data_id'),
            ),*/
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);


    }

    public function ajax(){
        $id = request('id',0);
        $currentValue = request('currentValue','');
        $GLOBALS['_debug_hidden']=true;
        if($id){
            $category2s = db::fetch_all(db::query('select id,il_name as name from m_type where pid='.$id.' order by id'));
            $data = '';
            foreach($category2s as $v){
                if($currentValue==$v['id'])
                    $data .= '<option value="'.$v['id'].'" selected>'.$v['name']."</option>";
                else
                    $data .= '<option value="'.$v['id'].'">'.$v['name']."</option>";
            }
            if($data){
                $data = '<option value="">请选择</option>'.$data;
                exit(json_encode(array('str'=>'success','data'=>$data)));
            }else{
                exit(json_encode(array('str'=>'success','data'=>'<option value="">请选择</option>')));
            }
        }else{
            exit(json_encode(array('str'=>'参数错误了')));
        }
    }

    public function delete(){
		
        $id = (int)req::item($this->_dbfield['mainKey'],0);
		
        if($id && $this->table){
            $arrdata = array();
            //$arrdata = db::get_one('select cover,upload_cover,content,type,content_length from `'.$this->table.'` where id='.$id.' limit 1');

            $r = db::query('delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
			
            if($r){
                //删除图片
                if($arrdata['type']==1){
                    $this->_deleteImage($arrdata['cover']);
                    $this->_deleteImage($arrdata['upload_cover']);
                    $this->_deleteImage($arrdata['content']);
                }
                
                cls_msgbox::show('系统提示','删除成功！','?ct='.$this->ct.'&amp;ac='.$this->listPage);
            }else{
                cls_msgbox::show('系统提示','删除失败！',-1);
            }
        }else{
            cls_msgbox::show('系统提示','参数错误！',-1);
        }
    }

    private function _deleteImage($image){
        if(is_array($image)){
            foreach($image as $v){
                $this->_deleteImage($v);
            }
        }elseif($image && file_exists(PATH_ROOT.$image)){
            @unlink(PATH_ROOT.$image);
        }
    }
    
    
    /**
     * 批量删除
     */
    public function batch_delete(){
        $ids    = req::item('ids', '');
        if(empty($ids))
        {
            cls_msgbox::show('对不起，出错了！', '你没有选择项目！', '-1');
        }
        if(!isset($this->_dbfield['batchDeleteTableField']) || empty($this->_dbfield['batchDeleteTableField']) || !$this->_dbfield['batchDeleteTableField']['mainKey'])
        {
            cls_msgbox::show('对不起，出错了！', '不允许该操作！', '-1');
        }

       
        $success   = $failure = 0;
        $arrDeleteFileFields = $arrDeleteExtendTables = array();
        if(isset($this->_dbfield['batchDeleteTableField']['extend']) && $this->_dbfield['batchDeleteTableField']['extend']){
            foreach($this->_dbfield['batchDeleteTableField']['extend'] as $k=>$v){
                if($k=='delete_file' && $v)$arrDeleteFileFields = $v;
                if($k=='delete_extend_table' && $v)$arrDeleteExtendTables = $v;
            }
        }
        
        foreach ($ids as $key => $id)
        {
            if($id && $this->_dbfield['mainKey']){
                $arrTemp = array();
                $arrTemp = db::get_one('select * from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
                if(empty($arrTemp)){
                    $failure++;
                    continue;
                }
                $strSql = '';
                $result = false;

                if($this->_dbfield['mainKey'] && $id)$strSql = 'delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1';
                $result =  db::query($strSql);
                if($result >= 0)
                {
                    $success++;
                    if($arrDeleteFileFields){
                        foreach($arrDeleteFileFields as $strFileField){
                            if(isset($arrTemp[$strFileField]) && $arrTemp[$strFileField]){
                                @unlink(PATH_ROOT.$arrTemp[$strFileField]);
                                if(OPEN_DEBUG){
                                    file_put_contents(PATH_ROOT.'/admin.txt', 'unlink :'.PATH_ROOT.$arrTemp[$strFileField],FILE_APPEND);
                                }
                            }
                        }
                    }
                    /*
                    'xingzuo_data_extend_image'=>array(
                            'mainKey'=>'id',
                            'unionKey'=>'data_id',
                            'delete_file'=>array('image','cover'),
                        ),         
                     */
                    if($arrDeleteExtendTables){
                        foreach($arrDeleteExtendTables as $strTableName=>$arrTableInfo){
                            if($strTableName && isset($arrTemp[$arrTableInfo['mainKey']]) && $arrTemp[$arrTableInfo['mainKey']] && isset($arrTableInfo['unionKey']) && $arrTableInfo['unionKey']){
                                $arrItemInfoTemp = array();
                                if(isset($arrTableInfo['delete_file']) && $arrTableInfo['delete_file']){
                                    $arrItemInfoTemp = db::fetch_all(db::query('select `'.$arrTableInfo['unionKey'].'`,'.trim(implode(',', $arrTableInfo['delete_file']),',').' from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`="'.  addslashes($arrTemp[$arrTableInfo['mainKey']]).'"'));
                                }else{
                                    $arrItemInfoTemp = db::fetch_all(db::query('select `'.$arrTableInfo['unionKey'].'` from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`="'.  addslashes($arrTemp[$arrTableInfo['mainKey']]).'"'));
                                }
                                if($arrItemInfoTemp){
                                    if(isset($arrTableInfo['delete_file']) && $arrTableInfo['delete_file']){
                                        foreach($arrItemInfoTemp as $arrdeleteFiles){
                                            foreach($arrTableInfo['delete_file'] as $strdeletefield){
                                                if(isset($arrdeleteFiles[$strdeletefield]) && $arrdeleteFiles[$strdeletefield]){
                                                    $this->_deleteImage($arrdeleteFiles[$strdeletefield]);
                                                }
                                            }
                                        }
                                    }
                                    if( $arrTemp[$arrTableInfo['mainKey']] && $arrTableInfo['unionKey'] ){
                                       db::query('delete from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`='.$arrTemp[$arrTableInfo['mainKey']].' limit '.(int)count($arrItemInfoTemp)); 
                                    }
                                }
                                
                            }
                        }
                    }
                    
                     //是否需要清理缓存
                    if(isset($this->_updateCache) && !empty($this->_updateCache)){
                        foreach($this->_updateCache as $arrItem){
                            if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                                $strCacehKeyTemp = '';
                                foreach ($arrTemp as $strField=>$strFieldValue){
                                    $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $arrTemp[$strField], $arrItem['key']);
                                }
                                if($strCacehKeyTemp){
                                    cache::del($arrItem['prefix'], $strCacehKeyTemp);
                                    cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                                }
                            }
                        }
                    }

                }
                else
                {
                    $failure++;
                }
            }else{
                $failure++;
            }
            //var_dump($displayorders);exit();
        }
        $referurl   = empty($_SERVER['HTTP_REFERER']) ? '?ct='.$this->ct.'&amp;ac='.$this->listPage : $_SERVER['HTTP_REFERER'];
        // cls_msgbox::show('成功了！', '数据修改成功！', '?ct=video&ac=video_list&page_no='.$pagen);
        cls_msgbox::show('成功了！', "成功删除：{$success}条，失败:{$failure}条！", $referurl);
    }
    
    //更新采集资源的状态 最新采集的资源status为99 正常status为1
    public function updatestatus(){
        echo 'start<br />';
        if(db::query('update xingzuo_data set `status`="1" where `status`="99" limit 1000')){
            echo 'success!';
        }else{
            echo 'fail!';
        }
        exit();
    }

    public function statistics(){
        $this->_dbfield=array(
            'mainKey'=>'category',
            'allTableField'=>array('intdate'=>'日期', 'category'=>'栏目','cp'=>'cp','total'=>'数量','status'=>'状态','start_date'=>'开始日期','end_date'=>'结束日期',),
            'listTableField'=>array('status'),
            'addTableField'=>array(),
            'editTableField'=>array(),
            'batchUpdateTableField'=>array(),
            'batchDeleteTableField'=>array(),
            
            'status'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>array('1'=>'正常','11'=>'禁用','99'=>'未初始化',)),
                'search'=>'1',
            ),
            
        );
        tpl::assign('_allowAction',array());
        tpl::assign('_dbfield',$this->_dbfield);
        /**接收搜索值***/
        $where = '';
        $where_arr = array();
        $config['url_prefix'] = "?ct=".$this->ct."&ac=".$this->ac;
        foreach($this->_dbfield as $k=>$v){
            if(isset($v['search']) && $v['search']==1){
                $temp = '';
                $temp = 'search'.$k;
                $temp = req::item($k,'');

                tpl::assign('search'.$k,$temp);

                if(!empty($temp)){
                    if(isset($v['search_extend']) && $v['search_extend']=='like'){
                        $where_arr[] = "`".$k."` like '%".$temp."%'";
                    }elseif(isset($v['search_extend']) && $v['search_extend']['direct']){
                        if($k=='start_date' || $k=='end_date') {
                            $where_arr[] = "`intdate`".$v['search_extend']['direct']."'".date('ymd', strtotime($temp))."'";
                        }else {
                            $where_arr[] = "`" . $k . "`" . $v['search_extend']['direct'] . "'" . $temp . "'";
                        }
                    }else{
                        $where_arr[] = "`".$k."` = '".$temp."'";
                    }
                    //将查询关键字添加到页码后面
                    $config['url_prefix'] .='&'.$k.'='.$temp;
                }
            }
        }

        //exit();

        /**************/

        if(!empty($where_arr)) $where = ' where '.implode(' and ', $where_arr);
        else{
            //默认设成当天的
            $where = " where `intdate`='".date('ymd')."' ";
            $searchdate = date('Y-m-d');
            $config['url_prefix'] .='&start_date='.$searchdate.'&end_date='.$searchdate;
        }
        $sql2 = "SELECT intdate,category,COUNT(title) AS total,`status` FROM `".$this->table."`".$where." GROUP BY intdate,category,`status` ORDER BY intdate desc,category ";
        $size = $config['page_size'] = 10; //每页显示多少
        $config['current_page'] = req::item('page_no'); //接收页码
        empty($config['current_page']) && $config['current_page'] = 1;
        tpl::assign('current_page',$config['current_page']);

        $sql1 = "SELECT count(*) as total,sum(total) as recsum FROM (".$sql2.") as x ";
        $rsid = db::fetch_one(db::query($sql1));
        $config['total_rs'] = $rsid['total']; //总记录数
        $recSum = $rsid['recsum']; //总记录数

        $pages  = util::pagination($config); //取得分页信息
        tpl::assign('pages',$pages);

        $offset = ($config['current_page'] - 1) * $size;
        $sql2 .= " LIMIT {$offset},{$size}";
        $query = db::query($sql2);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql2);
            echo '-->';
        }

        tpl::assign('data_list',$rows);
        tpl::assign('data_sum',$recSum);

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            //var_dump($this->ct.'.'.$this->ac.'.tpl');exit();
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }
    }

}

