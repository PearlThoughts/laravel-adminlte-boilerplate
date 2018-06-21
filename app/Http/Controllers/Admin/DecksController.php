<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deck;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\ResourceController;

class DecksController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.decks';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::decks';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Deck::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'decks';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'name' => 'required',
                'description' => 'required',
                'categoty_id' => 'required',
                'type' => 'required',
                'status' => 'required',
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
                'name' => 'required',
                'description' => 'required',
                'categoty_id' => 'required',
                'type' => 'required',
                'status' => 'required',              ],
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
        $values['name'] = $request->input('name', '');
        $values['description'] = $request->input('description', '');
        $values['categoty_id'] = $request->input('categoty_id', '');
        $values['type'] = $request->input('type', '');
        $values['status'] = $request->input('status', '');

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
