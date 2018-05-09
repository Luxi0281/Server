<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFundTranslationAPIRequest;
use App\Http\Requests\API\UpdateFundTranslationAPIRequest;
use App\Models\FundTranslation;
use App\Repositories\FundTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FundTranslationController
 * @package App\Http\Controllers\API
 */

class FundTranslationAPIController extends AppBaseController
{
    /** @var  FundTranslationRepository */
    private $fundTranslationRepository;

    public function __construct(FundTranslationRepository $fundTranslationRepo)
    {
        $this->fundTranslationRepository = $fundTranslationRepo;
    }

    /**
     * Display a listing of the FundTranslation.
     * GET|HEAD /fundTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->fundTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        //fundTranslations = $this->fundTranslationRepository->all();
        $fundTranslations = DB::table('languages')
            ->select(
                'funds.id',
                'languages.language_code',
                'languages.language_name',
                'fund_translations.title',
                'fund_translations.description',
                'funds.picture',
                'funds.link',
                'funds.email',
                'funds.phone',
                'locations.latitude',
                'locations.longitude',
                'addresses.zip_code',
                'address_translations.full_address',
                'city_translations.city_name',
                'provinces.province_code',
                'province_translations.province_name',
                'country_translations.country_name',
                'countries.country_code'
            )
            ->join('fund_translations','fund_translations.language_id', '=', 'languages.id')
            ->join('funds', 'funds.id', '=', 'fund_translations.fund_id')
            ->join('locations', 'locations.id', '=', 'funds.location_id')
            ->join('addresses', 'addresses.id', '=', 'locations.address_id')
            ->join('address_translations', function ($join){
                $join->on('address_translations.address_id', '=', 'addresses.id');
                $join->on('languages.id', '=', 'address_translations.language_id');
            })
            ->join('cities', 'cities.id', '=', 'addresses.city_id')
            ->join('city_translations', function ($join){
                $join->on('city_translations.city_id', '=', 'cities.id');
                $join->on('languages.id', '=', 'city_translations.language_id');
            })
            ->join('provinces', 'provinces.id', '=', 'cities.province_id')
            ->join('province_translations', function ($join){
                $join->on('province_translations.province_id', '=', 'provinces.id');
                $join->on('languages.id','=','province_translations.language_id');
            })
            ->join('countries', 'countries.id', '=', 'provinces.country_id')
            ->join('country_translations', function ($join){
                $join->on('country_translations.country_id', '=', 'countries.id');
                $join->on('languages.id', '=', 'country_translations.language_id');
            })
            ->get();

        return $this->sendResponse($fundTranslations->toArray(), 'Fund Translations retrieved successfully');
    }

    /**
     * Store a newly created FundTranslation in storage.
     * POST /fundTranslations
     *
     * @param CreateFundTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFundTranslationAPIRequest $request)
    {
        $input = $request->all();

        $fundTranslations = $this->fundTranslationRepository->create($input);

        return $this->sendResponse($fundTranslations->toArray(), 'Fund Translation saved successfully');
    }

    /**
     * Display the specified FundTranslation.
     * GET|HEAD /fundTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        return $this->sendResponse($fundTranslation->toArray(), 'Fund Translation retrieved successfully');
    }

    /**
     * Update the specified FundTranslation in storage.
     * PUT/PATCH /fundTranslations/{id}
     *
     * @param  int $id
     * @param UpdateFundTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        $fundTranslation = $this->fundTranslationRepository->update($input, $id);

        return $this->sendResponse($fundTranslation->toArray(), 'FundTranslation updated successfully');
    }

    /**
     * Remove the specified FundTranslation from storage.
     * DELETE /fundTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        $fundTranslation->delete();

        return $this->sendResponse($id, 'Fund Translation deleted successfully');
    }
}
