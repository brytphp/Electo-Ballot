const Ziggy = {"url":"http:\/\/electo-ballot.test","port":null,"defaults":{},"routes":{"short-url.invoke":{"uri":"short\/{shortURLKey}","methods":["GET","HEAD"],"parameters":["shortURLKey"]},"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"],"parameters":["key","tags"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"password.confirm":{"uri":"user\/confirm-password","methods":["POST"]},"horizon.stats.index":{"uri":"horizon\/api\/stats","methods":["GET","HEAD"]},"horizon.workload.index":{"uri":"horizon\/api\/workload","methods":["GET","HEAD"]},"horizon.masters.index":{"uri":"horizon\/api\/masters","methods":["GET","HEAD"]},"horizon.monitoring.index":{"uri":"horizon\/api\/monitoring","methods":["GET","HEAD"]},"horizon.monitoring.store":{"uri":"horizon\/api\/monitoring","methods":["POST"]},"horizon.monitoring-tag.paginate":{"uri":"horizon\/api\/monitoring\/{tag}","methods":["GET","HEAD"],"parameters":["tag"]},"horizon.monitoring-tag.destroy":{"uri":"horizon\/api\/monitoring\/{tag}","methods":["DELETE"],"wheres":{"tag":".*"},"parameters":["tag"]},"horizon.jobs-metrics.index":{"uri":"horizon\/api\/metrics\/jobs","methods":["GET","HEAD"]},"horizon.jobs-metrics.show":{"uri":"horizon\/api\/metrics\/jobs\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"horizon.queues-metrics.index":{"uri":"horizon\/api\/metrics\/queues","methods":["GET","HEAD"]},"horizon.queues-metrics.show":{"uri":"horizon\/api\/metrics\/queues\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"horizon.jobs-batches.index":{"uri":"horizon\/api\/batches","methods":["GET","HEAD"]},"horizon.jobs-batches.show":{"uri":"horizon\/api\/batches\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"horizon.jobs-batches.retry":{"uri":"horizon\/api\/batches\/retry\/{id}","methods":["POST"],"parameters":["id"]},"horizon.pending-jobs.index":{"uri":"horizon\/api\/jobs\/pending","methods":["GET","HEAD"]},"horizon.completed-jobs.index":{"uri":"horizon\/api\/jobs\/completed","methods":["GET","HEAD"]},"horizon.silenced-jobs.index":{"uri":"horizon\/api\/jobs\/silenced","methods":["GET","HEAD"]},"horizon.failed-jobs.index":{"uri":"horizon\/api\/jobs\/failed","methods":["GET","HEAD"]},"horizon.failed-jobs.show":{"uri":"horizon\/api\/jobs\/failed\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"horizon.retry-jobs.show":{"uri":"horizon\/api\/jobs\/retry\/{id}","methods":["POST"],"parameters":["id"]},"horizon.jobs.show":{"uri":"horizon\/api\/jobs\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"horizon.index":{"uri":"horizon\/{view?}","methods":["GET","HEAD"],"wheres":{"view":"(.*)"},"parameters":["view"]},"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"api.ballot.data.options":{"uri":"api\/ballot\/data\/options\/{position}","methods":["GET","HEAD"],"parameters":["position"]},"api.ballot.data.get.preference":{"uri":"api\/ballot\/data\/preference","methods":["GET","HEAD"]},"api.ballot.data.save.preference":{"uri":"api\/ballot\/data\/preference","methods":["POST"]},"api.ballot.paper.vote":{"uri":"api\/ballot\/paper\/vote","methods":["POST"]},"api.auth.verify-otp":{"uri":"api\/api\/auth\/verify-otp","methods":["POST"]},"index":{"uri":"\/","methods":["GET","HEAD"]},"home":{"uri":"home","methods":["GET","HEAD"]},"voter.verification.form":{"uri":"verify","methods":["GET","HEAD"]},"voter.verification.resend":{"uri":"verify\/resend","methods":["GET","HEAD"]},"voter.exhibition":{"uri":"exhibition","methods":["GET","HEAD"]},"voter.exhibition.submit":{"uri":"exhibition","methods":["POST"]},"voter.exhibition.details":{"uri":"exhibition\/voter\/{voter}","methods":["GET","HEAD"],"parameters":["voter"],"bindings":{"voter":"id"}},"voter.exhibition.update":{"uri":"exhibition\/voter\/{user}\/update","methods":["POST"],"parameters":["user"],"bindings":{"user":"id"}},"voter-inclusion":{"uri":"voter-inclusion","methods":["GET","HEAD"]},"voter-inclusion.submit":{"uri":"voter-inclusion","methods":["POST"]},"sms-call-back-response":{"uri":"sms-call-back-response","methods":["POST"]},"profile":{"uri":"profile\/{candidate}","methods":["GET","HEAD"],"parameters":["candidate"],"bindings":{"candidate":"id"}},"update-firebase-token":{"uri":"fcm-token","methods":["PATCH"]},"notification":{"uri":"send-notification","methods":["POST"]},"sms-callback":{"uri":"sms-callback","methods":["POST"]},"voter.ballot.status":{"uri":"app\/election\/status","methods":["GET","HEAD"]},"voter.ballot.success":{"uri":"app\/ballot\/success","methods":["GET","HEAD"]},"voter.ballot.confirm":{"uri":"app\/ballot\/confirm","methods":["GET","HEAD"]},"voter.ballot.paper":{"uri":"app\/ballot\/{position}","methods":["GET","HEAD"],"parameters":["position"]},"voter.ballot.skip":{"uri":"app\/{position}\/skip\/{next}","methods":["GET","HEAD"],"parameters":["position","next"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
