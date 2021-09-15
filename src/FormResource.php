<?php
/***
 * ┌───┐   ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┐
 * │Esc│   │ F1│ F2│ F3│ F4│ │ F5│ F6│ F7│ F8│ │ F9│F10│F11│F12│ │P/S│S L│P/B│  ┌┐    ┌┐    ┌┐
 * └───┘   └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┘  └┘    └┘    └┘
 * ┌───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───────┐ ┌───┬───┬───┐ ┌───┬───┬───┬───┐
 * │~ `│! 1│@ 2│# 3│$ 4│% 5│^ 6│& 7│* 8│( 9│) 0│_ -│+ =│ BacSp │ │Ins│Hom│PUp│ │N L│ / │ * │ - │
 * ├───┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─────┤ ├───┼───┼───┤ ├───┼───┼───┼───┤
 * │ Tab │ Q │ W │ E │ R │ T │ Y │ U │ I │ O │ P │{ [│} ]│ | \ │ │Del│End│PDn│ │ 7 │ 8 │ 9 │   │
 * ├─────┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴─────┤ └───┴───┴───┘ ├───┼───┼───┤ + │
 * │ Caps │ A │ S │ D │ F │ G │ H │ J │ K │ L │: ;│" '│ Enter  │               │ 4 │ 5 │ 6 │   │
 * ├──────┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴────────┤     ┌───┐     ├───┼───┼───┼───┤
 * │ Shift  │ Z │ X │ C │ V │ B │ N │ M │< ,│> .│? /│  Shift   │     │ ↑ │     │ 1 │ 2 │ 3 │   │
 * ├─────┬──┴─┬─┴──┬┴───┴───┴───┴───┴───┴──┬┴───┼───┴┬────┬────┤ ┌───┼───┼───┐ ├───┴───┼───┤ E││
 * │ Ctrl│    │Alt │         Space         │ Alt│    │    │Ctrl│ │ ← │ ↓ │ → │ │   0   │ . │←─┘│
 * └─────┴────┴────┴───────────────────────┴────┴────┴────┴────┘ └───┴───┴───┘ └───────┴───┴───┘
 *
 *  Filename: TableResource.php
 *  User: yuanbo
 *  Date: 2021-09-15
 *  Time: 15:05:58
 */

namespace yuanbo\ApiResource;
use yuanbo\ApiResource\JsonResource;


/**
 * 表单资源类
 *
 * @param  \think\Request $request
 * @return array
 */
class FormResource extends JsonResource
{
    /**
     * 将资源转换成数组。
     *
     * @param  \think\Request $request
     * @return array
     */
    public function toArray($data)
    {
        return [
            'type' => $data->type,//表单类型枚举 input select textarea number checkbox radio date time rate slider treeSelect cascader batch editor switch button b-upload b-password b-address b-select-ajax b-jsonedit b-map
            'label'=>$data->label,//表单中文标识 String
            'tips'=>$data->tips,//表单字段提示 String
            'name'=>$data->name,//字段名 String
            'default_value'=>$data->default_value,//默认值 String|Number
            'options'=>$data->options,//选项数组 Array<{lable:string,value:string|number}>
            'options_code'=>$data->options_code,//选择的code，和options二选一 string
            'required'=>$data->required,//是否必须 Boolean true or flase
            'args'=>[  //扩展属性 Object<FormItemOption >
                //参数	描述	数据类型	是否必须	默认
                'width'=>$data->args->width,	//宽度	String	否	无
                'placeholder'=>$data->args->placeholder,	//占位符	String	否	无
                'clearable'=>$data->args->clearable,	//是否支持清理	Boolean	否	false
                'maxLength'=>$data->args->maxLength,	//最大输入长度	null | Int	否	无
                'hidden'=>$data->args->hidden,	//是否隐藏	Boolean	否	false
                'disabled'=>$data->args->disabled	//是否禁止输入	Boolean	否	false
            ],
        ];
    }
}