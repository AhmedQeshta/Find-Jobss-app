<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminJobsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id = null)
    {
        $rules = [];

        if($id){
            $rules['title'] = 'required|min:3|max:50|unique:jobs,title'. $id;
        }else {
            $rules['title'] = 'required|min:3|max:50|unique:jobs,title';
        }

        $rules['name'] = 'required' ;
        $rules['description' ] = 'required';
        $rules['ageGroupFrom' ] = 'required';
        $rules['ageGroupTo' ] = 'required';
        $rules['experience' ] = 'required';
        $rules['price' ] = 'required';
        $rules['specialization' ] = 'required';
        $rules['address' ] = 'required';
        $rules['city' ] = 'required';
        $rules['country' ] = 'required';
        $rules['typeJob' ] = 'required';
        $rules['DaysOfWork' ] = 'required';
        $rules['BusinessHoursFrom' ] = 'required';
        $rules['BusinessHoursFromTime' ] = 'required';
        $rules['BusinessHoursTo' ] = 'required';
        $rules['BusinessHoursToTime' ] = 'required';

        return $rules;


    }
}
