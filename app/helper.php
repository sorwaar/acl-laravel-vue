<?php

	use Illuminate\Support\Facades\DB;
    use App\Model\Setup\AssignMerchandiser;

	function dateConvertFormtoDB($date){
		if(!empty($date)){
			return date("Y-m-d",strtotime(str_replace('/','-',$date)));
		}
	}

	function dateConvertDBtoForm($date){
		if(!empty($date)){
			$date = strtotime($date);
			return date('d/m/Y', $date);
		}
	}

	function showMenu(){
        $modules = \Illuminate\Support\Facades\Session::get('modules');
        $menus = \Illuminate\Support\Facades\Session::get('menus');

        $sideMenu = [];
        if($menus){
            foreach ($menus as $menu){
                if(!isset($sideMenu[$menu['module_id']])){
                    $moduleId = array_search($menu['module_id'], array_column($modules, 'id'));
                    if($menu['name'] !='') {
                        $sideMenu[$menu['module_id']] = [];
                        $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                        $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                        $sideMenu[$menu['module_id']]['menu_url'] = '#';
                        $sideMenu[$menu['module_id']]['parent_id'] = '';
                        $sideMenu[$menu['module_id']]['module_id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['flag'] = "hasChildMenu";
                        $sideMenu[$menu['module_id']]['sub_menu'] = [];
                    }else{
                        $sideMenu[$menu['module_id']] = [];
                        $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                        $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                        $sideMenu[$menu['module_id']]['menu_url'] = $menu['menu_url'];
                        $sideMenu[$menu['module_id']]['flag'] = "noChildMenu";
                        $sideMenu[$menu['module_id']]['sub_menu'] = [];
                    }
                }
                if($menu['name'] !='') {
                    if ($menu['parent_id'] == 0) {
                        $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']] = $menu;
                        $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']]['sub_menu'] = [];
                    } else {
                        if (isset($sideMenu[$menu['module_id']]['sub_menu'][$menu['parent_id']])){
                            array_push($sideMenu[$menu['module_id']]['sub_menu'][$menu['parent_id']]['sub_menu'], $menu);
                        }
                    }
                }

            }
        }
        return $sideMenu;
    }

    function arrayKeyValueSearch($array, $key, $value)
    {
        $results = array();
        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }
            foreach ($array as $subArray) {
                $results = array_merge($results, arrayKeyValueSearch($subArray, $key, $value));
            }
        }
        return $results;
    }

    function assignedMerchandiser($id)
    {
        $result = AssignMerchandiser::with(['users' => function($q) use ($id){
            $q->where('user_id', $id);
        }])->get()->toArray();

        $data = [
            'buyer_id' => [],
            'brand_id' => []
        ];

        foreach ($result as $key => $row):
            array_push($data['buyer_id'], $row['buyer_id']);
            foreach ($row['users'] as $key => $user):
                array_push($data['brand_id'], $user['brand_id']);
            endforeach;
        endforeach;

        return $data;
    }

    function getEnums($className)
    {
        $oClass = new ReflectionClass ($className);
        return $oClass->getStaticProperties();
    }

    function ordinal($number) {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number. 'th';
        else
            return $number. $ends[$number % 10];
    }

    function d($data)
    {
        if (is_array($data)){
            dd($data);
        }elseif (is_object($data)){
            dd($data->toArray());
        }
    }

    function fabricDescriptionString($yarnDetail){
        $string = '';
	    foreach ($yarnDetail as $detail){
            if (is_object($yarnDetail)){
                $detail = $detail->toArray();
            }

            $additionText = [];
            foreach($detail['yarn_addition'] as $addition){
                $additionText[] = $addition['addition']['name'];
            }
            $additionText = implode(", ", $additionText);

            $string .= $detail['ratio'] ? ' ' . $detail['ratio'] . ' %' : '';
            $string .= $detail['yarn_count'] ? ' '. $detail['yarn_count']['name'] : '';
            $string .= $detail['yarn_composition'] ? ' '. $detail['yarn_composition']['name'] : '';
            $string .= $detail['yarn_color'] ? ' '. $detail['yarn_color']['name'] : '';
            $string .= ' '. $additionText;
        }
        return $string;
    }
?>
