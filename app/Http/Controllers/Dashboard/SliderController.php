<?php

// App\Http\Controllers\Dashboard\SliderController.php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Services\Dashboard\Slider\SliderServiceInterface;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderServiceInterface $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        $sliders = $this->sliderService->getAllSliders();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        $this->sliderService->createSlider($request->validated());
        return redirect()->route('dashboard.sliders.index')->with('success_message', 'The slider has been added successfully');
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $this->sliderService->updateSlider($slider, $request->validated());
        return redirect()->route('dashboard.sliders.index')->with('success_message', 'The slider has been updated successfully');
    }

    public function show(Slider $slider)
    {
        return view('dashboard.sliders.show', compact('slider'));
    }

    public function destroy(Slider $slider)
    {
        $this->sliderService->deleteSlider($slider);
        return redirect()->route('dashboard.sliders.index')->with('success_message', 'The slider has been deleted successfully');
    }
}
