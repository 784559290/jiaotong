<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RecommendedFrom extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        // dump($input);

        $img = $input['img'];
        Cache::put('img', $img);
        return $this->success('Processed successfully.', 'RecommendedFrom');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->multipleImage('img','推荐')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->required()->sortable();

    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        $img = Cache('img');
        return [
            'img'  => $img,
        ];
    }
}
