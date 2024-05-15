<?php
namespace App\Services\Dashboard\Slider;

use App\Helpers;
use App\Models\Slider;

class SliderService implements SliderServiceInterface
{
    public function getAllSliders()
    {
        return Slider::paginate(3);
    }

    public function createSlider(array $attributes): void
    {
        $attributes['image'] = (new Helpers)->uploadImage($attributes['image'], 'Sliders');
        Slider::create($attributes);
    }

    public function updateSlider(Slider $slider, array $attributes): void
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = (new Helpers)->uploadImage($attributes['image'], 'Sliders');
        }
        $slider->update($attributes);
    }

    public function deleteSlider(Slider $slider): void
    {
        $slider->delete();
    }
}
