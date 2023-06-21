<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Repositories\PipelineRepository;
use Illuminate\Http\Request;

class AchievementAgentController extends Controller
{
    public $achievementAgentImage = "https://cdn-mdr.appbuilder.my.id/Achievement-Agent.jpg";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pipelineRepo = new PipelineRepository();
        $contactId = $request->query('contact');
        $kanalId = $request->query('kanal');
        
        $GWPTotal = $pipelineRepo->sum($contactId, false, "MdrGWP");
        $ANPTotal = $pipelineRepo->sum($contactId, true, "MdrPremiDisetahunkan");
        $agentCount = Contact::where('MdrLKANALDISTRIBUSIId', $kanalId)->count();
        $pipelineIsKomitCount = $pipelineRepo->count($contactId, true);

        $data = [
            [
                'id' => 0,
                'title' => 'Total GWP',
                'info' => 'IDR '.number_format(round($GWPTotal/1000000, 2)).' JT',
                'image' => [
                    'id' => 0,
                    'full' => [
                        'url' => $this->achievementAgentImage
                    ],
                    'thumb' => [
                        'url' => $this->achievementAgentImage
                    ],
                ],
            ],
            [
                'id' => 1,
                'title' => 'Total ANP',
                'info' => 'IDR '.number_format(round($ANPTotal/1000000, 2)).' JT',
                'image' => [
                    'id' => 0,
                    'full' => [
                        'url' => $this->achievementAgentImage
                    ],
                    'thumb' => [
                        'url' => $this->achievementAgentImage
                    ],
                ],
            ],
            [
                'id' => 2,
                'title' => "Total Agent",
                'info' => $agentCount." Agent",
                'image' => [
                    'id' => 0,
                    'full' => [
                        'url' => $this->achievementAgentImage
                    ],
                    'thumb' => [
                        'url' => $this->achievementAgentImage
                    ],
                ],
            ],
            [
                'id' => 3,
                'title' => "Commitment",
                'info' => $pipelineIsKomitCount." Commitment",
                'image' => [
                    'id' => 0,
                    'full' => [
                        'url' => $this->achievementAgentImage
                    ],
                    'thumb' => [
                        'url' => $this->achievementAgentImage
                    ],
                ],
            ]
            
            
            
        ];
        return response()->json($data);
    }
}
