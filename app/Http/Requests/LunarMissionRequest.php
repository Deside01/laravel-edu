<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LunarMissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mission' => 'required',
            'mission.name' => 'required|string|max:255',
            'mission.launch_details' => 'required',
            'mission.launch_details.launch_date' => 'required|date-format:Y-m-d',
            'mission.launch_details.launch_site' => 'required',
            'mission.launch_details.launch_site.name' => 'required',
            'mission.launch_details.launch_site.location' => 'required',
            'mission.launch_details.launch_site.location.latitude' => 'required',
            'mission.launch_details.launch_site.location.longitude' => 'required',
            'mission.landing_details' => 'required',
            'mission.landing_details.landing_date' => 'required|date-format:Y-m-d',
            'mission.landing_details.landing_site' => 'required',
            'mission.landing_details.landing_site.name' => 'required',
            'mission.landing_details.landing_site.coordinates' => 'required',
            'mission.landing_details.landing_site.coordinates.latitude' => 'required',
            'mission.landing_details.landing_site.coordinates.longitude' => 'required',
            'mission.spacecraft' => 'required',
            'mission.spacecraft.command_module' => 'required',
            'mission.spacecraft.lunar_module' => 'required',
            'mission.spacecraft.crew' => 'required|array',
            'mission.spacecraft.crew.*.name' => 'required',
            'mission.spacecraft.crew.*.role' => 'required',

        ];
    }
}
