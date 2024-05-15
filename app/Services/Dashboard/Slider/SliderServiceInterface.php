<?php

namespace App\Services\Dashboard\Slider;

use App\Models\Slider;

interface SliderServiceInterface
{
    public function getAllSliders();
    public function createSlider(array $attributes): void;
    public function updateSlider(Slider $slider, array $attributes): void;
    public function deleteSlider(Slider $slider): void;
}
