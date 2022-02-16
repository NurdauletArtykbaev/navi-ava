<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ReplyReviewSaveRequest;
use App\Http\Requests\Api\User\UserCertificationSaveRequest;
use App\Http\Resources\Api\User\UserCertificationsResource;
use App\Http\Resources\User\UserReviewsResource;
use App\Models\UserCertificate;
use App\Models\UserReview;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
    }


    public function getReviews(Request $request)
    {
        $user = auth()->user();
        $reviews = UserReview::allReviewsUserBy($user->id)
            ->with('user', 'reviewer', 'reply.reviewer')
            ->orderByDesc('created_at')
            ->where('user_id', 0)
            ->whereNull('parent_id')
            ->paginate(UserReview::PAGINATION_PER_PAGE);
        return UserReviewsResource::collection($reviews);

    }

    public function getReviewedReviews()
    {
        $user = auth()->user();
        $reviews = UserReview::reviewerBy($user->id)
            ->with('user', 'reviewer', 'reply.reviewer')
            ->orderByDesc('created_at')
            ->whereNull('parent_id')
            ->paginate(UserReview::PAGINATION_PER_PAGE);

        return UserReviewsResource::collection($reviews);
    }

    public function getAboutMeReviews()
    {
        $user = auth()->user();
        $reviews = UserReview::userBy($user->id)
            ->with('reply.reviewer', 'reviewer')
            ->orderByDesc('created_at')
            ->whereNull('parent_id')
            ->paginate(UserReview::PAGINATION_PER_PAGE);
        return UserReviewsResource::collection($reviews);
    }

    public function saveReply(ReplyReviewSaveRequest $request)
    {
        $reply = new UserReview();
        $reply->parent_id = $request->review_id;
        $reply->text = $request->text;
        $reply->user_id = auth()->user()->id;
        $reply->reviewer_id = auth()->user()->id;
        $reply->save();
        $reply->load('reviewer');
        return new UserReviewsResource($reply);
    }

    public function getCertifications()
    {
        $user = auth()->user();
        $reviews = UserCertificate::userBy($user->id)
            ->orderByDesc('created_at')
            ->get();
        return UserCertificationsResource::collection($reviews);
    }

    public function saveCertifications(UserCertificationSaveRequest $request)
    {
        $user = auth()->user();
        foreach ($request->certifications as $key => $certificate) {

            if ($certificate['id'] && $certificate['id'] != 'null') {
                $originCertificate = UserCertificate::find($certificate['id']);
                if (!empty($originCertificate)) {
                    $originCertificate->name = $certificate['name'];
                    $originCertificate->description = $certificate['description'];
                    if ($request->hasFile('certifications.' . $key . '.image')) {
                        $originCertificate->image = FileService::saveFile($request->file('certifications.' . $key . '.image'), UserCertificate::IMAGE_PATH);

                    }
                    $originCertificate->save();
                }
            } else {
                $originCertificate = new UserCertificate();
                $originCertificate->name = $certificate['name'];
                $originCertificate->description = $certificate['description'];
                $originCertificate->user_id = $user->id;
                $originCertificate->image = FileService::saveFile($request->file('certifications.' . $key . '.image'), UserCertificate::IMAGE_PATH);
                $originCertificate->save();
            }
        }
        return response()->json(['status' => true]);
    }

    public function deleteCertifications($id)
    {
        $user = auth()->user();
        $certification = UserCertificate::userBy($user->id)->findOrFail($id);
        FileService::deleteFile($certification->image, UserCertificate::IMAGE_PATH);
        $certification->delete();
        return response()->json(['success' => true]);

    }
}
