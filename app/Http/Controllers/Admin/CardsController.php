<?php

namespace App\Http\Controllers\Admin;

use App\Models\Card;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\ResourceController;

class CardsController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.cards';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::cards';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Card::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'cards';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'card_type' => 'required',
                'display_type' => 'required',
                'is_import' => 'required',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * Used to validate update.
     *
     * @param $record
     * @return array
     */
    private function resourceUpdateValidationData($record)
    {
        return [
            'rules' => [
                'card_type' => 'required',
                'display_type' => 'required',
                'is_import' => 'required',                 ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param null $record
     * @return array
     */
    private function getValuesToSave(Request $request, $record = null)
    {
        $creating = is_null($record);
        $values = [];
        $values['card_type'] = $request->input('card_type', '');
        $values['display_type'] = $request->input('display_type', '');
        $values['is_import'] = $request->input('is_import', '');
       
        return $values;
    }

    private function alterValuesToSave(Request $request, $values)
    {
      
        return $values;
    }

    /**
     * @param $record
     * @return bool
     */
    private function checkDestroy($record)
    {
        return true;
    }

    /**
     * Retrieve the list of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $show
     * @param string|null $search
     * @return \Illuminate\Support\Collection
     */
    private function getSearchRecords(Request $request, $show = 15, $search = null)
    {
        

        return $this->getResourceModel()::paginate($show);
    }
}
