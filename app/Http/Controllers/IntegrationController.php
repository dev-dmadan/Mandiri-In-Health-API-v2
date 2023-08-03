<?php

namespace App\Http\Controllers;

use App\Traits\CreatioHelperTrait;
use Exception;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    use CreatioHelperTrait {
        CreatioHelperTrait::__construct as private creatioHelper;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->creatioHelper();
    }
    /**
    * INSERT PREMI
    */
    public function insertPremi(Request $request)
    {
        $result = (Object)array(
        );

        try {
            $response = $this->restCreatio([
                'service' => 'IntegrasiWebService',
                'method' => 'InsertPremi'
            ], 'POST', false, [
                'data' => $request->has('data') ? $request->input('data') : null,
            ]);
            
            // $result->success = true;
            $result = response()->json($response->Response)->original->InsertPremiResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
            $result->success = false;
        }
        
        return response()->json($result);
    }
    /**
    * UPDATE QUOTATION
    */
    public function updateQuotation(Request $request)
    {
        $result = (Object)array(
        );

        try {
            $response = $this->restCreatio([
                'service' => 'IntegrasiWebService',
                'method' => 'UpdateQuotation'
            ], 'POST', false, [
                'data' => $request->has('data') ? $request->input('data') : null,
            ]);
            
            // $result->success = true;
            $result = response()->json($response->Response)->original->UpdateQuotationResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
            $result->success = false;
        }
        
        return response()->json($result);
    }
    /**
    * UPDATE CLOSING
    */
    public function updateClosing(Request $request)
    {
        $result = (Object)array(
        );

        try {
            $response = $this->restCreatio([
                'service' => 'IntegrasiWebService',
                'method' => 'UpdateStatusClosing'
            ], 'POST', false, [
                'transaction_number' => $request->has('transaction_number') ? $request->input('transaction_number') : null,
                'status' => $request->has('status') ? $request->input('status') : null
            ]);
            
            // $result->success = true;
            $result = response()->json($response->Response)->original->UpdateStatusClosingResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
            $result->success = false;
        }
        
        return response()->json($result);
    }

    /**
    * GET AGENT
    */
    public function getAgent(Request $request)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $result = (Object)array(
            'success' => false,
            'message' => null,
            'data' => null
        );

        try {
            $response = $this->restCreatio([
                'service' => 'ReferenceWebService',
                'method' => 'GetAgent'
            ], 'POST', false, [
                'Id' => $request->has('Id') ? $request->input('Id') : $guidEmpty
            ]);
            
            $result->success = true;
            $result->data = response()->json($response->Response)->original->GetAgentResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
        }
        
        return response()->json($result);
    }

    
    /**
    * GET COINSURANCE
    */
    public function getCoInsurance(Request $request)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $result = (Object)array(
            'success' => false,
            'message' => null,
            'data' => null
        );

        try {
            $response = $this->restCreatio([
                'service' => 'ReferenceWebService',
                'method' => 'GetCoInsurance'
            ], 'POST', false, [
                'Id' => $request->has('Id') ? $request->input('Id') : $guidEmpty
            ]);
            
            $result->success = true;
            $result->data = response()->json($response->Response)->original->GetCoInsuranceResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
        }
        
        return response()->json($result);
    }

    /**
    * GET BROKER
    */
    public function getBroker(Request $request)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $result = (Object)array(
            'success' => false,
            'message' => null,
            'data' => null
        );

        try {
            $response = $this->restCreatio([
                'service' => 'ReferenceWebService',
                'method' => 'GetBrokerData'
            ], 'POST', false, [
                'Id' => $request->has('Id') ? $request->input('Id') : $guidEmpty
            ]);
            
            $result->success = true;
            $result->data = response()->json($response->Response)->original->GetBrokerDataResult;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
        }
        
        return response()->json($result);
    }
}
