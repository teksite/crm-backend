<?php
namespace Lareon\CMS\App\Http\Controllers\Ajax\Admin;

use Illuminate\Http\Request;
use Lareon\CMS\App\Http\Controllers\Controller;

class AjaxGetModelController extends Controller
{
    public function get(Request $request)
    {
        $modelClass = $request->get('model');
        $valueField = $request->get('value', 'id');
        $searchFields = explode(',', $request->get('search', 'title'));
        $query = $request->get('q');

        abort_unless(class_exists($modelClass), 400, 'Invalid model');

        $builder = (new $modelClass)->newQuery();

        if ($query) {
            $words = explode(' ', $query); // جدا کردن هر کلمه
            $builder->where(function ($qBuilder) use ($searchFields, $words) {
                foreach ($words as $word) {
                    $qBuilder->where(function($sub) use ($searchFields, $word) {
                        foreach ($searchFields as $i => $field) {
                            $i === 0
                                ? $sub->where($field, 'like', "%{$word}%")
                                : $sub->orWhere($field, 'like', "%{$word}%");
                        }
                    });
                }
            });
        }

        $results = $builder
            ->select(array_merge([$valueField], $searchFields))
            ->limit(20)
            ->get()
            ->map(function($item) use ($valueField, $searchFields) {
                return [
                    'id' => $item->{$valueField},
                    'text' => collect($searchFields)
                        ->map(fn($f) => $item->{$f})
                        ->filter()
                        ->implode(' '),
                ];
            });

        return response()->json($results); // آرایه مستقیم
    }
}
